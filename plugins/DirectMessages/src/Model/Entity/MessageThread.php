<?php
declare(strict_types=1);

namespace DirectMessages\Model\Entity;

use App\Model\Entity\User;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * MessageThread Entity
 *
 * @property int $id
 * @property int $user_1_id
 * @property int $user_2_id
 * @property int|null $message_count
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 *
 * @property User $user1
 * @property User $user2
 * @property Message[] $messages
 *
 * @property ?int $requester_id
 * @property ?int $user_id
 * @property ?User $user
 * @property int $unread
 */
class MessageThread extends Entity
{
    protected $_virtual = ['requester_id', 'user_id', 'user', 'unread'];
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
        'user_1_id' => true,
        'user_2_id' => true,
        'message_count' => true,
        'created' => true,
        'modified' => true,
        'user1' => true,
        'user2' => true,
        'messages' => true,
    ];

    protected function _setRequesterId(int $requester_id): void
    {
        $this->requester_id = $requester_id;

        $this->user_id = $this->user_1_id === $requester_id
            ? $this->user_2_id
            : $this->user_1_id;

        $this->user = $this->user_1_id === $requester_id
            ? $this->user2
            : $this->user1;

        $this->unread = !$this->messages || count($this->messages) === 0
            ? null
            : collection($this->messages)->reduce(function (int $total, Message $message) use ($requester_id) {
                return $message->user_id !== $requester_id && $message->read === null
                    ? ++$total
                    : $total;
            }, 0);
    }
}
