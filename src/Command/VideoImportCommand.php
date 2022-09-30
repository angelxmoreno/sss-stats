<?php
declare(strict_types=1);

namespace App\Command;

use App\Model\Entity\YouTubeVideo;
use App\Model\Table\EpisodesTable;
use App\Model\Table\YouTubeVideosTable;
use App\Service\YouTubeApi;
use Cake\Chronos\Date;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Core\Configure;

/**
 * VideoImport command.
 *
 * @property YouTubeApi $service
 * @property Arguments $args
 * @property ConsoleIo $io
 * @property YouTubeVideosTable $YouTubeVideos
 * @property EpisodesTable $Episodes
 */
class VideoImportCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $this->service = new YouTubeApi();
        $this->args = $args;
        $this->io = $io;
        $this->Episodes = $this->fetchTable(EpisodesTable::class);
        $this->YouTubeVideos = $this->fetchTable(YouTubeVideosTable::class);
        $this->main();
    }

    protected function main()
    {
        $playlistId = Configure::readOrFail('YouTube.playlistId');
        $this->import($playlistId);
        $this->matchEpisodes();
    }

    protected function import(string $playlistId, ?string $pageToken = null)
    {
        $this->io->out('Fetching videos using pageToken: ' . (string)$pageToken);
        $playlistVideo = $this->service->getVideosByPlaylistId($playlistId, $pageToken);
        $videos = $playlistVideo->getVideos();
        foreach ($videos as $video) {
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
            $this->io->out('Saving --- ' . $youTubeVideo->title);
            $this->YouTubeVideos->saveOrFail($youTubeVideo);
        }

        if ($playlistVideo->getNextPageToken()) {
            $this->import($playlistId, $playlistVideo->getNextPageToken());
        }
    }

    protected function matchEpisodes(int $page = 1)
    {
        /** @var YouTubeVideo[] $videos */
        $videos = $this->YouTubeVideos->find()->limit(100)->page($page)->all();

        foreach ($videos as $video) {
            if (preg_match('/\[SSS #([0-9]+)\]/', $video->title, $matches)) {
                $this->io->out(sprintf('%s correlates to episode #%s', $video->title, $matches[1]));
                $episode = $this->Episodes->findOrCreate([
                    'episode_number' => $matches[1],
                ]);

                $episode->you_tube_video_id = $video->id;
                $this->Episodes->saveOrFail($episode);
            }
        }
    }
}
