<?php
/**
 * @var AppView $this
 * @var MessageThread $messageThread
 */

use App\View\AppView;
use DirectMessages\Model\Entity\MessageThread;

$array = $messageThread->toArray();
foreach ([
             'user_1_id',
             'user_2_id',
             'user1',
             'user2',
             'requester_id',
         ] as $prop) {
    unset($array[$prop]);
}
echo json_encode($array);

