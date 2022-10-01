<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * YouTubeComment Entity
 *
 * @property int $id
 * @property string $uid
 * @property int $you_tube_comment_author_id
 * @property int|null $parent_id
 * @property int|null $you_tube_video_id
 * @property bool|null $can_reply
 * @property bool|null $is_public
 * @property int|null $total_reply_count
 * @property bool|null $can_rate
 * @property int|null $like_count
 * @property FrozenTime|null $published_at
 * @property string|null $text_display
 * @property string|null $text_original
 * @property FrozenTime|null $updated_at
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property YouTubeVideo $you_tube_video
 * @property YouTubeCommentAuthor $you_tube_comment_author
 */
class YouTubeComment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'uid' => true,
        'you_tube_comment_author_id' => true,
        'parent_id' => true,
        'you_tube_video_id' => true,
        'can_reply' => true,
        'is_public' => true,
        'total_reply_count' => true,
        'can_rate' => true,
        'like_count' => true,
        'published_at' => true,
        'text_display' => true,
        'text_original' => true,
        'updated_at' => true,
        'created' => true,
        'modified' => true,
        'you_tube_video' => true,
        'you_tube_comment_author' => true,
    ];
}
