<?php
/**
 * @var AppView $this
 * @var Person[]|CollectionInterface $people
 */

use App\Model\Entity\Person;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Manage People')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($people as $person) : ?>
        <tr>
            <td><?= $this->Number->format($person->id) ?></td>
            <td><?= $person->has('user') ? $this->Html->link($person
                    ->user->name, ['controller' =>
                    'Users', 'action' => 'view', $person->user
                    ->id]) : '' ?>
            </td>
            <td><?= h($person->name) ?></td>
            <td><?= h($person->created) ?></td>
            <td><?= h($person->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $person]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
