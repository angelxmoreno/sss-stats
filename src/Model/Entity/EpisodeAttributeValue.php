<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * EpisodeAttributeValue Entity
 *
 * @property int $id
 * @property int $episode_id
 * @property int $episode_attribute_id
 * @property int $user_id
 * @property string $value
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property Episode $episode
 * @property EpisodeAttribute $episode_attribute
 * @property User $user
 */
class EpisodeAttributeValue extends Entity
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
        'episode_id' => true,
        'episode_attribute_id' => true,
        'user_id' => true,
        'value' => true,
        'created' => true,
        'modified' => true,
        'episode' => true,
        'episode_attribute' => true,
        'user' => true,
    ];
}
