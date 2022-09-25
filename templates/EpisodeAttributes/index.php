<?php
/**
 * @var AppView $this
 * @var iterable<EpisodeAttribute> $episodeAttributes
 */

use App\Model\Entity\EpisodeAttribute;
use App\View\AppView;

?>
<div class="episodeAttributes index content">
    <?= $this->Html->link(__('New Episode Attribute'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Episode Attributes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($episodeAttributes as $episodeAttribute): ?>
                <tr>
                    <td><?= $this->Number->format($episodeAttribute->id) ?></td>
                    <td><?= h($episodeAttribute->name) ?></td>
                    <td><?= h($episodeAttribute->type) ?></td>
                    <td><?= h($episodeAttribute->created) ?></td>
                    <td><?= h($episodeAttribute->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $episodeAttribute->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $episodeAttribute->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $episodeAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeAttribute->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
