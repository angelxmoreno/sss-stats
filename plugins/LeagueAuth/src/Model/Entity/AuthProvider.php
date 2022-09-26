<?php
declare(strict_types=1);

namespace LeagueAuth\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * AuthProvider Entity
 *
 * @property int $id
 * @property string $provider
 * @property string $identifier
 * @property string|null $name
 * @property string $display_name
 * @property string|null $email
 * @property bool $email_verified
 * @property string|null $picture_url
 * @property string|null $access_token
 * @property string|null $refresh_token
 * @property FrozenTime|null $token_expires
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 */
class AuthProvider extends Entity
{
    protected $_virtual = ['display_name'];

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
        'provider' => true,
        'identifier' => true,
        'name' => true,
        'email' => true,
        'email_verified' => true,
        'picture_url' => true,
        'access_token' => true,
        'refresh_token' => true,
        'token_expires' => true,
        'created' => true,
        'modified' => true,
    ];

    protected function _getDisplayName(): string
    {
        return sprintf('%s:%s', $this->provider, $this->identifier);
    }
}
