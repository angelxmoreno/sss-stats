<?php
declare(strict_types=1);

namespace DirectMessages\Model\Entity;

use App\Model\Entity\User;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $message_thread_id
 * @property int $user_id
 * @property string $message
 * @property FrozenTime|null $read
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 * @property FrozenTime|null $deleted
 *
 * @property MessageThread $message_thread
 * @property User $user
 */
class Message extends Entity
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
        'message_thread_id' => true,
        'user_id' => true,
        'message' => true,
        'read' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'message_thread' => true,
        'user' => true,
    ];
}
