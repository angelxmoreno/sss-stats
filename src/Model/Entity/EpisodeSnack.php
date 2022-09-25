<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * EpisodeSnack Entity
 *
 * @property int $id
 * @property int $episode_id
 * @property int $snack_id
 * @property int $user_id
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property Episode $episode
 * @property Snack $snack
 * @property User $user
 */
class EpisodeSnack extends Entity
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
        'snack_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'episode' => true,
        'snack' => true,
        'user' => true,
    ];
}
