<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * FilmPerson Entity
 *
 * @property int $id
 * @property int $person_id
 * @property int $film_id
 * @property int $user_id
 * @property string|null $type
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property Person $person
 * @property Film $film
 * @property User $user
 */
class FilmPerson extends Entity
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
        'person_id' => true,
        'film_id' => true,
        'user_id' => true,
        'type' => true,
        'created' => true,
        'modified' => true,
        'person' => true,
        'film' => true,
        'user' => true,
    ];
}
