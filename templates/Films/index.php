<?php
/**
 * @var AppView $this
 * @var Film[]|CollectionInterface $films
 */

use App\Model\Entity\Film;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Manage Films')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('episode_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('submitted_by') ?></th>
        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
        <th scope="col"><?= $this->Paginator->sort('link') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($films as $film) : ?>
        <tr>
            <td><?= $this->Number->format($film->id) ?></td>
            <td><?= $film->has('episode') ? $this->Html->link($film
                    ->episode->id, ['controller' =>
                    'Episodes', 'action' => 'view', $film->episode
                    ->id]) : '' ?>
            </td>
            <td><?= $film->has('user') ? $this->Html->link($film
                    ->user->name, ['controller' =>
                    'Users', 'action' => 'view', $film->user
                    ->id]) : '' ?>
            </td>
            <td><?= $film->has('submitter') ? $this->Html->link($film
                    ->submitter->name, ['controller' =>
                    'People', 'action' => 'view', $film->submitter
                    ->id]) : '' ?>
            </td>
            <td><?= h($film->title) ?></td>
            <td><?= h($film->link) ?></td>
            <td><?= h($film->created) ?></td>
            <td><?= h($film->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $film]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
