<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * YouTubeVideoCount Entity
 *
 * @property int $id
 * @property int $you_tube_video_id
 * @property int|null $comment_count
 * @property int|null $dislike_count
 * @property int|null $favorite_count
 * @property int|null $like_count
 * @property int|null $view_count
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property YouTubeVideo $you_tube_video
 */
class YouTubeVideoCount extends Entity
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
        'you_tube_video_id' => true,
        'comment_count' => true,
        'dislike_count' => true,
        'favorite_count' => true,
        'like_count' => true,
        'view_count' => true,
        'created' => true,
        'modified' => true,
        'you_tube_video' => true,
    ];
}
