<?php
/**
 * @var AppView $this
 * @var iterable<Film> $films
 */

use App\Model\Entity\Film;
use App\View\AppView;

?>
<div class="films index content">
    <?= $this->Html->link(__('New Film'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Films') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('episode_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('submitted_by') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('link') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($films as $film): ?>
                <tr>
                    <td><?= $this->Number->format($film->id) ?></td>
                    <td><?= $film->has('episode') ? $this->Html->link($film->episode->id, ['controller' => 'Episodes', 'action' => 'view', $film->episode->id]) : '' ?></td>
                    <td><?= $film->has('user') ? $this->Html->link($film->user->name, ['controller' => 'Users', 'action' => 'view', $film->user->id]) : '' ?></td>
                    <td><?= $film->has('submitter') ? $this->Html->link($film->submitter->name, ['controller' => 'People', 'action' => 'view', $film->submitter->id]) : '' ?></td>
                    <td><?= h($film->title) ?></td>
                    <td><?= h($film->link) ?></td>
                    <td><?= h($film->created) ?></td>
                    <td><?= h($film->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $film->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $film->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id)]) ?>
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
