<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Film Entity
 *
 * @property int $id
 * @property int $episode_id
 * @property int $user_id
 * @property int $submitted_by
 * @property int $title
 * @property int $link
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property Episode $episode
 * @property User $user
 * @property FilmPerson[] $film_people
 * @property Person $submitter
 */
class Film extends Entity
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
        'user_id' => true,
        'submitted_by' => true,
        'title' => true,
        'link' => true,
        'created' => true,
        'modified' => true,
        'episode' => true,
        'user' => true,
        'film_people' => true,
        'submitter' => true,
    ];
}
