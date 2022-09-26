<?php
/**
 * @var AppView $this
 * @var Episode[]|CollectionInterface $episodes
 */

use App\Model\Entity\Episode;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Episodes')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('episode_number') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($episodes as $episode) : ?>
        <tr>
            <td><?= $this->Number->format($episode->id) ?></td>
            <td><?= h($episode->episode_number) ?></td>
            <td><?= h($episode->created) ?></td>
            <td><?= h($episode->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $episode]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
