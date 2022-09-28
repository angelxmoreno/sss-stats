<?php

namespace App\Service;

use Google\Client;
use Google\Service\YouTube;

class YouTubeApi
{
    use SimpleCacheTrait;

    protected YouTube $service;

    /**
     * @param Client|null $client
     */
    public function __construct(Client $client = null)
    {
        $client ??= GoogleClientFactory::create();
        $this->service = new YouTube($client);
    }

    /**
     * @param string $forUsername
     * @param string|null $pageToken
     * @return YouTube\ChannelListResponse
     */
    public function getUserChannels(string $forUsername, ?string $pageToken = null): YouTube\ChannelListResponse
    {
        $params = [
            'forUsername' => $forUsername,
            'maxResults' => 50,
            'pageToken' => $pageToken,
        ];

        return $this->cacheRemember('UserChannels', $params, function () use ($params) {
            return $this->service->channels->listChannels('contentDetails', $params);
        });
    }

    /**
     * @param YouTube\Channel $channel
     * @param string|null $pageToken
     * @return mixed
     */
    public function getChannelVideos(YouTube\Channel $channel, ?string $pageToken = null)
    {
        $uploadsPlaylistId = $channel->getContentDetails()->getRelatedPlaylists()->getUploads();

        return $this->cacheRemember('getChannelVideos', [$uploadsPlaylistId, $pageToken], function () use ($uploadsPlaylistId, $pageToken) {
            $playlistItemsResponse = $this->getPlayListItems($uploadsPlaylistId, $pageToken);

            $videoIds = collection($playlistItemsResponse->getItems())
                ->map(fn(YouTube\PlaylistItem $playlistItem) => $playlistItem->getSnippet()->getResourceId()->getVideoId())
                ->toArray();

            return [
                'nextPageToken' => $playlistItemsResponse->getNextPageToken(),
                'videos' => $this->getVideoDetails($videoIds)->getItems(),
            ];
        });
    }

    /**
     * @param string $playlistId
     * @param string|null $pageToken
     * @return YouTube\PlaylistItemListResponse
     */
    protected function getPlayListItems(string $playlistId, ?string $pageToken = null): YouTube\PlaylistItemListResponse
    {
        $params = [
            'playlistId' => $playlistId,
            'maxResults' => 50,
            'pageToken' => $pageToken,
        ];

        return $this->cacheRemember('PlayListItems', $params, function () use ($params) {
            return $this->service->playlistItems->listPlaylistItems('snippet', $params);
        });
    }

    /**
     * @param string|array $id
     * @return YouTube\VideoListResponse
     */
    protected function getVideoDetails($id): YouTube\VideoListResponse
    {
        $id = is_array($id)
            ? implode(',', $id)
            : $id;

        return $this->cacheRemember('VideoDetails', [$id], function () use ($id) {
            return $this->service->videos->listVideos('snippet,player,contentDetails,statistics', compact('id'));
        });
    }

    /**
     * @param string $playlistId
     * @param string|null $pageToken
     * @return PlayListVideoResponse
     */
    public function getVideosByPlaylistId(string $playlistId, ?string $pageToken = null): PlayListVideoResponse
    {
        return $this->cacheRemember('getVideosByPlaylistId', [$playlistId, $pageToken], function () use ($playlistId, $pageToken) {
            $playlistItemsResponse = $this->getPlayListItems($playlistId, $pageToken);

            $videoIds = collection($playlistItemsResponse->getItems())
                ->map(fn(YouTube\PlaylistItem $playlistItem) => $playlistItem->getSnippet()->getResourceId()->getVideoId())
                ->toArray();

            $videoListResponse = $this->getVideoDetails($videoIds);

            return new PlayListVideoResponse($playlistItemsResponse, $videoListResponse);
        });
    }
}
