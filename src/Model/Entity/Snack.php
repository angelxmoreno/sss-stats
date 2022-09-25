<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Snack Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $brand
 * @property string $type
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property EpisodeSnack[] $episode_snacks
 */
class Snack extends Entity
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
        'name' => true,
        'brand' => true,
        'type' => true,
        'created' => true,
        'modified' => true,
        'episode_snacks' => true,
    ];
}
