<?php
/**
 * @var AppView $this
 * @var EpisodeSnack[]|CollectionInterface $episodeSnacks
 */

use App\Model\Entity\EpisodeSnack;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Manage Episode Snacks')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('episode_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('snack_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($episodeSnacks as $episodeSnack) : ?>
        <tr>
            <td><?= $this->Number->format($episodeSnack->id) ?></td>
            <td><?= $episodeSnack->has('episode') ? $this->Html->link($episodeSnack
                    ->episode->id, ['controller' =>
                    'Episodes', 'action' => 'view', $episodeSnack->episode
                    ->id]) : '' ?>
            </td>
            <td><?= $episodeSnack->has('snack') ? $this->Html->link($episodeSnack
                    ->snack->name, ['controller' =>
                    'Snacks', 'action' => 'view', $episodeSnack->snack
                    ->id]) : '' ?>
            </td>
            <td><?= $episodeSnack->has('user') ? $this->Html->link($episodeSnack
                    ->user->name, ['controller' =>
                    'Users', 'action' => 'view', $episodeSnack->user
                    ->id]) : '' ?>
            </td>
            <td><?= h($episodeSnack->created) ?></td>
            <td><?= h($episodeSnack->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $episodeSnack]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
