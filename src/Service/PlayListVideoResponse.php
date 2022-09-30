<?php

namespace App\Service;

use Google\Service\YouTube\PlaylistItemListResponse;
use Google\Service\YouTube\Video;
use Google\Service\YouTube\VideoListResponse;

class PlayListVideoResponse
{
    protected PlaylistItemListResponse $playlistItemListResponse;
    protected VideoListResponse $videoListResponse;

    /**
     * @param PlaylistItemListResponse $playlistItemListResponse
     * @param VideoListResponse $videoListResponse
     */
    public function __construct(PlaylistItemListResponse $playlistItemListResponse, VideoListResponse $videoListResponse)
    {
        $this->playlistItemListResponse = $playlistItemListResponse;
        $this->videoListResponse = $videoListResponse;
    }

    /**
     * @return Video[]
     */
    public function getVideos(): array
    {
        return $this->videoListResponse->getItems();
    }

    public function getNextPageToken(): ?string
    {
        return $this->playlistItemListResponse->getNextPageToken();
    }
}
