<?php
declare(strict_types=1);

namespace App\View\Helper;

use BootstrapUI\View\Helper\HtmlHelper;
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
