<?php
/**
 * @var AppView $this
 * @var User[]|CollectionInterface $users
 */

use App\Model\Entity\User;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Manage Users')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->name) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $user]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
