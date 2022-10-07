<?php
declare(strict_types=1);

namespace App\Command;

use App\Model\Entity\Episode;
use App\Model\Entity\YouTubeVideo;
use App\Model\Entity\YouTubeVideoCount;
use App\Model\Table\EpisodesTable;
use App\Model\Table\YouTubeVideoCountsTable;
use App\Model\Table\YouTubeVideosTable;
use App\Service\GoogleObjectToEntities;
use App\Service\YouTubeApi;
use Cake\Chronos\Date;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Core\Configure;
use Google\Service\YouTube\Video;

/**
 * VideoImport command.
 *
 * @property YouTubeApi $service
 * @property Arguments $args
 * @property ConsoleIo $io
 * @property YouTubeVideosTable $YouTubeVideos
 * @property YouTubeVideoCountsTable $YouTubeVideoCounts
 * @property EpisodesTable $Episodes
 */
class VideoImportCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $this->service = new YouTubeApi(null, '_null_');
        $this->args = $args;
        $this->io = $io;
        $this->Episodes = $this->fetchTable(EpisodesTable::class);
        $this->YouTubeVideos = $this->fetchTable(YouTubeVideosTable::class);
        $this->YouTubeVideoCounts = $this->fetchTable(YouTubeVideoCountsTable::class);
        $this->main();
    }

    protected function main()
    {
        $playlistId = Configure::readOrFail('YouTube.playlistId');
        $this->import($playlistId);
    }

    protected function import(string $playlistId, ?string $pageToken = null)
    {
        $this->io->out('Fetching videos using pageToken: ' . (string)$pageToken);
        $playlistVideo = $this->service->getVideosByPlaylistId($playlistId, $pageToken);
        $videos = $playlistVideo->getVideos();
        foreach ($videos as $video) {
            $youTubeVideo = $this->creatYouTubeVideoFromResponse($video);
            $this->io->out('Found YouTube Video --- ' . $youTubeVideo->title);

            $this->io->out("\t" . 'Saving YouTube Video');
            $this->YouTubeVideos->saveOrFail($youTubeVideo);

            $youTubeVideoCount = $this->creatCountFromYouTubeVideo($youTubeVideo);
            $this->io->out("\t" . 'Saving Video Counts');
            $this->YouTubeVideoCounts->saveOrFail($youTubeVideoCount);

            $episode = $this->createEpisodeFromVideo($youTubeVideo);
            if ($episode) {
                $this->io->out("\t" . 'Saving Episode ' . $episode->name);
                $this->Episodes->saveOrFail($episode);
                $this->getVideoComments($youTubeVideo, $episode);
            }
        }

        if ($playlistVideo->getNextPageToken()) {
            $this->import($playlistId, $playlistVideo->getNextPageToken());
        }
    }

    protected function creatYouTubeVideoFromResponse(Video $video): YouTubeVideo
    {
        $youTubeVideo = $this->YouTubeVideos->findOrCreate([
            'uid' => $video->getId(),
        ]);
        $youTubeVideo->title = $video->getSnippet()->getTitle();
        $youTubeVideo->channel_title = $video->getSnippet()->getChannelTitle();
        $youTubeVideo->description = $video->getSnippet()->getDescription();
        $youTubeVideo->tags = $video->getSnippet()->getTags();
        $youTubeVideo->thumbnails = $video->getSnippet()->getThumbnails();
        $youTubeVideo->duration = $video->getContentDetails()->getDuration();
        $youTubeVideo->comment_count = $video->getStatistics()->getCommentCount();
        $youTubeVideo->dislike_count = $video->getStatistics()->getDislikeCount();
        $youTubeVideo->favorite_count = $video->getStatistics()->getFavoriteCount();
        $youTubeVideo->like_count = $video->getStatistics()->getLikeCount();
        $youTubeVideo->view_count = $video->getStatistics()->getViewCount();
        $youTubeVideo->published = new Date($video->getSnippet()->getPublishedAt());

        return $youTubeVideo;
    }

    protected function creatCountFromYouTubeVideo(YouTubeVideo $youTubeVideo): YouTubeVideoCount
    {
        return $this->YouTubeVideoCounts->newEntity([
            'you_tube_video_id' => $youTubeVideo->id,
            'comment_count' => $youTubeVideo->comment_count,
            'dislike_count' => $youTubeVideo->dislike_count,
            'favorite_count' => $youTubeVideo->favorite_count,
            'like_count' => $youTubeVideo->like_count,
            'view_count' => $youTubeVideo->view_count,
        ]);
    }

    protected function createEpisodeFromVideo(YouTubeVideo $youTubeVideo): ?Episode
    {
        if (preg_match('/\[SSS #([0-9]+)[^\]]*\]/', $youTubeVideo->title, $matches)) {
            $episode_number = $matches[1];
            $exists = $this->Episodes->findByEpisodeNumber($episode_number)->count() > 0;

            if ($exists) return null;
            $this->io->out(sprintf("\t" . '%s correlates to episode #%s', $youTubeVideo->title, $episode_number));
            return $this->Episodes->newEntity([
                'episode_number' => $episode_number,
                'you_tube_video_id' => $youTubeVideo->id,
                'title' => $youTubeVideo->title,
            ]);
        }
        return null;
    }

    protected function getVideoComments(YouTubeVideo $youTubeVideo, Episode $episode)
    {
        $this->io->out(sprintf("\t" . 'fetching comment threads from episode %s', $episode->episode_number));
        $response = $this->service->getVideoCommentThreads($youTubeVideo->uid);
        $this->io->out(sprintf("\t\t" . 'saving %n comment threads from episode %s', $response->count(), $episode->episode_number));
        GoogleObjectToEntities::commentThreadListResponseToYouTubeComments($response);
    }
}
