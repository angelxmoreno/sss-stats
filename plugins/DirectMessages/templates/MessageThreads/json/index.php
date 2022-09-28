<?php
/**
 * @var AppView $this
 * @var MessageThread[] $messageThreads
 */

use App\View\AppView;
use DirectMessages\Model\Entity\MessageThread;

echo json_encode([
    'pagination' => $this->getRequest()->getAttribute('paging')['MessageThreads'],
    'data' => collection($messageThreads)
        ->map(function (MessageThread $thread) {
            $array = $thread->toArray();
            foreach ([
                         'user_1_id',
                         'user_2_id',
                         'user1',
                         'user2',
                         'requester_id',
                     ] as $prop) {
                unset($array[$prop]);
            }

            return $array;
        })->toArray(),
]);

