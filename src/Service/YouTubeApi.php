<?php

namespace App\Service;

use Google\Client;
use Google\Service\YouTube;
use Google\Service\YouTube\CommentListResponse;
use Google\Service\YouTube\CommentThreadListResponse;

class YouTubeApi
{
    use ApiCacheTrait;

    protected const DEFAULT_CACHE_NAME = '_google_api_';
    protected static ?YouTubeApi $_instance = null;
    protected YouTube $service;
    protected string $cacheName;

    /**
     * @param Client|null $client
     * @param string|null $cacheName
     */
    public function __construct(Client $client = null, ?string $cacheName = null)
    {
        $client ??= GoogleClientFactory::create();
        $cacheName ??= self::DEFAULT_CACHE_NAME;

        $this->service = new YouTube($client);
        $this->cacheName = $cacheName;
    }

    public static function getInstance(): YouTubeApi
    {
        if (!self::$_instance) {
            self::$_instance = new YouTubeApi();
        }

        return self::$_instance;
    }

    /**
     * @param string $forUsername
     * @param string|null $pageToken
     * @return YouTube\ChannelListResponse
     * @deprecated
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
     * @deprecated
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

    /**
     * @param string $videoId
     * @param string|null $pageToken
     * @return CommentThreadListResponse
     */
    public function getVideoCommentThreads(string $videoId, ?string $pageToken = null): CommentThreadListResponse
    {
        $prefix = __FUNCTION__;
        $parts = 'snippet';
        $params = [
            'videoId' => $videoId,
            'maxResults' => 50,
            'order' => 'relevance',
        ];
        $params['pageToken'] = $pageToken === 'next' ? $this->getNextPageToken($prefix, [$parts, $params]) : $pageToken;
        return $this->cacheRemember($prefix, [$parts, $params], function () use ($prefix, $parts, $params) {
            $response = $this->service->commentThreads->listCommentThreads($parts, $params);
            $this->setNextPageToken($prefix, [$parts, $params], $response->getNextPageToken());
            return $response;
        });
    }

    /**
     * @param string|string[] $commentId
     * @param string|null $pageToken
     * @return CommentListResponse
     */
    public function getCommentReplies(string $commentId, ?string $pageToken = null): CommentListResponse
    {
        $prefix = __FUNCTION__;
        $parts = 'snippet';
        $params = [
            'parentId' => $commentId,
            'maxResults' => 50,
        ];
        $params['pageToken'] = $pageToken === 'next' ? $this->getNextPageToken($prefix, [$parts, $params]) : $pageToken;

        return $this->cacheRemember($prefix, [$parts, $params], function () use ($prefix, $parts, $params) {
            $response = $this->service->comments->listComments($parts, $params);
            $this->setNextPageToken($prefix, [$parts, $params], $response->getNextPageToken());
            return $response;
        });
    }
}
