<?php
declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Helper\UserEntityTrait;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
use LeagueAuth\Model\Entity\AuthProvider;

/**
 * User Entity
 *
 * @property int $id
 * @property int|null $google_auth_provider_id
 * @property string $name
 * @property string $email
 * @property string|null $password
 * @property string|null $picture_url
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property AuthProvider $google_auth_provider
 * @property EpisodeAttributeValue[] $episode_attribute_values
 * @property EpisodeSnack[] $episode_snacks
 * @property FilmPerson[] $film_people
 * @property Film[] $films
 * @property Person[] $people
 */
class User extends Entity
{
    use UserEntityTrait;

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
        'google_auth_provider_id' => true,
        'name' => true,
        'email' => true,
        'password' => true,
        'picture_url' => true,
        'created' => true,
        'modified' => true,
        'google_auth_provider' => true,
        'episode_attribute_values' => true,
        'episode_snacks' => true,
        'film_people' => true,
        'films' => true,
        'people' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
