<?php
declare(strict_types=1);

namespace App\View\Helper;

use App\Model\Entity\YouTubeVideo;
use BootstrapUI\View\Helper\HtmlHelper;
use Cake\Routing\Router;
use Cake\View\Helper;

/**
 * YouTube helper
 *
 * @property HtmlHelper $Html
 * @property Helper\UrlHelper $Url
 */
class YouTubeHelper extends Helper
{
    protected $helpers = ['Html', 'Url'];

    public function renderVideo(YouTubeVideo $video): string
    {
        $origin = Router::url(null, true);
        $src = 'https://www.youtube.com/embed/' . $video->uid . '?' . http_build_query([
                'origin' => $origin,
                'playsinline' => 1,
                'playlist' => $video->uid,
                'loop' => 1,
            ]);

        $iframe = $this->Html->tag('iframe', '', [
            'src' => $src,
            'frameborder' => '0',
            'allowfullscreen' => '1',
            'allow' => 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture',
            'title' => $video->title,
        ]);
        return $this->Html->div('ratio ratio-16x9', $iframe);
    }

    public function renderThumbnail(?string $episodeNumber = null): string
    {
        return $this->getView()->cell('VideoPreview', [$episodeNumber])->render();
    }

    public function renderMostViews(int $numItems = 4, string $title = 'Most Views'): string
    {
        $seeMoreUri = $this->Url->buildFromPath('Episodes::index', ['?' => ['sort' => 'YouTubeVideos.view_count']]);
        $params = [
            [
                'limit' => $numItems,
                'order' => ['YouTubeVideos.view_count' => 'DESC'],
            ],
            $title,
            $seeMoreUri,
        ];
        return $this->getView()->cell('VideoPreview::titledRows', $params)->render();
    }

    public function renderMostLikes(int $numItems = 4, string $title = 'Most Likes'): string
    {
        $seeMoreUri = $this->Url->buildFromPath('Episodes::index', ['?' => ['sort' => 'YouTubeVideos.like_count']]);
        $params = [
            [
                'limit' => $numItems,
                'order' => ['YouTubeVideos.like_count' => 'DESC'],
            ],
            $title,
            $seeMoreUri,
        ];
        return $this->getView()->cell('VideoPreview::titledRows', $params)->render();
    }


    public function renderMostCommented(int $numItems = 4, string $title = 'Most Commented on'): string
    {
        $seeMoreUri = $this->Url->buildFromPath('Episodes::index', ['?' => ['sort' => 'YouTubeVideos.comment_count']]);

        $params = [
            [
                'limit' => $numItems,
                'order' => ['YouTubeVideos.comment_count' => 'DESC'],
            ],
            $title,
            $seeMoreUri,
        ];
        return $this->getView()->cell('VideoPreview::titledRows', $params)->render();
    }
}
