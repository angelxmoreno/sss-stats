<?php
/**
 * @var AppView $this
 * @var iterable<EpisodeSnack> $episodeSnacks
 */

use App\Model\Entity\EpisodeSnack;
use App\View\AppView;

?>
<div class="episodeSnacks index content">
    <?= $this->Html->link(__('New Episode Snack'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Episode Snacks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('episode_id') ?></th>
                <th><?= $this->Paginator->sort('snack_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($episodeSnacks as $episodeSnack): ?>
                <tr>
                    <td><?= $this->Number->format($episodeSnack->id) ?></td>
                    <td><?= $episodeSnack->has('episode') ? $this->Html->link($episodeSnack->episode->id, ['controller' => 'Episodes', 'action' => 'view', $episodeSnack->episode->id]) : '' ?></td>
                    <td><?= $episodeSnack->has('snack') ? $this->Html->link($episodeSnack->snack->name, ['controller' => 'Snacks', 'action' => 'view', $episodeSnack->snack->id]) : '' ?></td>
                    <td><?= $episodeSnack->has('user') ? $this->Html->link($episodeSnack->user->name, ['controller' => 'Users', 'action' => 'view', $episodeSnack->user->id]) : '' ?></td>
                    <td><?= h($episodeSnack->created) ?></td>
                    <td><?= h($episodeSnack->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $episodeSnack->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $episodeSnack->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $episodeSnack->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeSnack->id)]) ?>
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
