<?php
declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Helper\ThumbnailCollection;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * YouTubeVideo Entity
 *
 * @property int $id
 * @property string $uid
 * @property string|null $title
 * @property string|null $channel_title
 * @property string|null $description
 * @property array|null $tags
 * @property ThumbnailCollection|null $thumbnails
 * @property string|null $duration
 * @property int|null $comment_count
 * @property int|null $dislike_count
 * @property int|null $favorite_count
 * @property int|null $like_count
 * @property int|null $view_count
 * @property FrozenTime|null $published
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 * @property FrozenTime|null $deleted
 */
class YouTubeVideo extends Entity
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
        'title' => true,
        'channel_title' => true,
        'description' => true,
        'tags' => true,
        'thumbnails' => true,
        'duration' => true,
        'comment_count' => true,
        'dislike_count' => true,
        'favorite_count' => true,
        'like_count' => true,
        'view_count' => true,
        'published' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
    ];
}
