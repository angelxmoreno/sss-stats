<?php

namespace App\Service;

use App\Model\Entity\YouTubeComment;
use App\Model\Entity\YouTubeCommentAuthor;
use App\Model\Table\YouTubeCommentAuthorsTable;
use App\Model\Table\YouTubeCommentsTable;
use App\Model\Table\YouTubeVideosTable;
use Cake\Chronos\Chronos;
use Cake\Core\Configure;
use Cake\Core\Exception\CakeException;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Google\Service\YouTube\CommentListResponse;
use Google\Service\YouTube\CommentSnippet;
use Google\Service\YouTube\CommentThreadListResponse;
use Throwable;

class GoogleObjectToEntities
{

    /**
     * @param CommentListResponse $response
     * @return YouTubeComment[]
     */
    public static function commentListResponseToYouTubeComments(CommentListResponse $response): array
    {
        $comments = [];
        $items = $response->getItems();
        foreach ($items as $item) {
            debug($item);
            try {
                $snippet = $item->getSnippet();
                $parent = self::getYouTubeCommentsTable()->findByUid($snippet->getParentId())->firstOrFail();
                $author = self::upsertAuthor($snippet);
                $comment = self::upsert(self::getYouTubeCommentsTable(), [
                    'you_tube_comment_author_id' => $author->id,
                    'uid' => $item->getId(),
                ], [
                    'parent_id' => $parent->id,
                    'can_rate' => $snippet->getCanRate(),
                    'like_count' => $snippet->getLikeCount(),
                    'published_at' => new Chronos($snippet->getPublishedAt()),
                    'updated_at' => new Chronos($snippet->getUpdatedAt()),
                    'text_display' => $snippet->getTextDisplay(),
                    'text_original' => $snippet->getTextOriginal(),
                    'can_reply' => null,
                    'is_public' => null,
                    'total_reply_count' => null,
                ]);
                $comments[] = $comment;
            } catch (Throwable $e) {
                if (Configure::read('debug')) {
                    debug($e->getMessage());
                    debug(compact('snippet', 'parent', 'author', 'comment'));
                    debug($response);
                }
                throw new CakeException('Unable to convert CommentThreadListResponse', 500, $e);
            }
        }
        return $comments;
    }

    /**
     * @return YouTubeCommentsTable
     */
    protected static function getYouTubeCommentsTable(): Table
    {
        return TableRegistry::getTableLocator()->get(YouTubeCommentsTable::class);
    }

    /**
     * @param CommentSnippet $commentSnippet
     * @return YouTubeCommentAuthor
     */
    protected static function upsertAuthor(CommentSnippet $commentSnippet): EntityInterface
    {
        return self::upsert(self::getYouTubeCommentAuthorsTable(), [
            'name' => $commentSnippet->getAuthorDisplayName(),
        ], [
            'image_url' => $commentSnippet->getAuthorProfileImageUrl(),
            'channel_uid' => $commentSnippet->getAuthorChannelId()->getValue(),
        ]);
    }

    /**
     * @param Table $table
     * @param array $search
     * @param array $patch
     * @return EntityInterface
     */
    protected static function upsert(Table $table, array $search, array $patch = []): EntityInterface
    {
        try {
            $entity = $table->findOrCreate($search);
            if (count($patch) > 0) {
                $entity = $table->patchEntity($entity, $patch);
                $entity = $table->saveOrFail($entity);
            }

            return $entity;
        } catch (Throwable $e) {
            throw new CakeException(sprintf(
                'Unable to upsert %s due to "%s" using "%s"',
                $table->getAlias(),
                $e->getMessage(),
                json_encode($search, JSON_PRETTY_PRINT)
            ));
        }
    }

    /**
     * @return YouTubeCommentAuthorsTable
     */
    protected static function getYouTubeCommentAuthorsTable(): Table
    {
        return TableRegistry::getTableLocator()->get(YouTubeCommentAuthorsTable::class);
    }

    /**
     * @param CommentThreadListResponse $response
     * @return YouTubeComment[]
     */
    public static function commentThreadListResponseToYouTubeComments(CommentThreadListResponse $response): array
    {
        $comments = [];
        $items = $response->getItems();
        foreach ($items as $item) {
            try {
                $snippet = $item->getSnippet();

                $video = self::getYouTubeVideosTable()->findByUid($snippet->getVideoId())->firstOrFail();
                $author = self::upsertAuthor($snippet->getTopLevelComment()->getSnippet());

                $comment = self::upsert(self::getYouTubeCommentsTable(), [
                    'you_tube_comment_author_id' => $author->id,
                    'uid' => $item->getId(),
                ], [
                    'you_tube_video_id' => $video->id,
                    'can_reply' => $snippet->getCanReply(),
                    'is_public' => $snippet->getIsPublic(),
                    'total_reply_count' => $snippet->getTotalReplyCount(),
                    'can_rate' => $snippet->getTopLevelComment()->getSnippet()->getCanRate(),
                    'like_count' => $snippet->getTopLevelComment()->getSnippet()->getLikeCount(),
                    'text_display' => $snippet->getTopLevelComment()->getSnippet()->getTextDisplay(),
                    'text_original' => $snippet->getTopLevelComment()->getSnippet()->getTextOriginal(),
                    'published_at' => new Chronos($snippet->getTopLevelComment()->getSnippet()->getPublishedAt()),
                    'updated_at' => new Chronos($snippet->getTopLevelComment()->getSnippet()->getUpdatedAt()),
                ]);
                $comments[] = $comment;
            } catch (Throwable $e) {
                if (Configure::read('debug')) {
                    debug($e->getMessage());
                    debug(compact('video', 'author', 'comment'));
                    debug($response);
                }
                throw new CakeException('Unable to convert CommentThreadListResponse', 500, $e);
            }
        }
        return $comments;
    }

    /**
     * @return YouTubeVideosTable
     */
    protected static function getYouTubeVideosTable(): Table
    {
        return TableRegistry::getTableLocator()->get(YouTubeVideosTable::class);
    }

}
