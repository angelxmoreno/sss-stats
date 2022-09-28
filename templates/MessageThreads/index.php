<?php
/**
 * @var AppView $this
 * @var MessageThread[] $messageThreads
 */

use App\View\AppView;
use DirectMessages\Model\Entity\MessageThread;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Message Threads')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('unread') ?></th>
        <th scope="col"><?= $this->Paginator->sort('message_count') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($messageThreads as $messageThread) : ?>
        <tr>
            <td>
                <?= $messageThread->user->picture_url ? $this->Html->image($messageThread->user->picture_url) : null ?>
                <?= $messageThread->user->name ?>
            </td>
            <td><?= $this->Number->format($messageThread->unread) ?></td>
            <td><?= $this->Number->format($messageThread->message_count) ?></td>
            <td><?= h($messageThread->modified) ?></td>
            <td class="actions">
                <div class="btn-group btn-group-sm" role="group">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $messageThread->user_id], ['title' => __('View'), 'class' => 'btn btn-outline-success']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $messageThread->user_id], ['confirm' => __('Are you sure you want to delete the thread?'), 'title' => __('Delete'), 'class' => 'btn btn-outline-danger']) ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
