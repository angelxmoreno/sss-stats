<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Episode Entity
 *
 * @property int $id
 * @property string $episode_number
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property EpisodeAttributeValue[] $episode_attribute_values
 * @property EpisodeSnack[] $episode_snacks
 * @property Film[] $films
 * @property Snack[] $snacks
 */
class Episode extends Entity
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
        'episode_number' => true,
        'created' => true,
        'modified' => true,
        'episode_attribute_values' => true,
        'episode_snacks' => true,
        'films' => true,
        'snacks' => true,
    ];
}
