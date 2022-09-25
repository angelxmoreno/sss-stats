<?php
/**
 * @var AppView $this
 * @var iterable<Snack> $snacks
 */

use App\Model\Entity\Snack;
use App\View\AppView;

?>
<div class="snacks index content">
    <?= $this->Html->link(__('New Snack'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Snacks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('brand') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($snacks as $snack): ?>
                <tr>
                    <td><?= $this->Number->format($snack->id) ?></td>
                    <td><?= h($snack->name) ?></td>
                    <td><?= h($snack->brand) ?></td>
                    <td><?= h($snack->type) ?></td>
                    <td><?= h($snack->created) ?></td>
                    <td><?= h($snack->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $snack->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $snack->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $snack->id], ['confirm' => __('Are you sure you want to delete # {0}?', $snack->id)]) ?>
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
