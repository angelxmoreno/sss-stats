<?php
/**
 * @var AppView $this
 * @var EpisodeAttribute[]|CollectionInterface $episodeAttributes
 */

use App\Model\Entity\EpisodeAttribute;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Episode Attributes')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('type') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($episodeAttributes as $episodeAttribute) : ?>
        <tr>
            <td><?= $this->Number->format($episodeAttribute->id) ?></td>
            <td><?= h($episodeAttribute->name) ?></td>
            <td><?= h($episodeAttribute->type) ?></td>
            <td><?= h($episodeAttribute->created) ?></td>
            <td><?= h($episodeAttribute->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $episodeAttribute]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
