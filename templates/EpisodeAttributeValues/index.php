<?php
/**
 * @var AppView $this
 * @var iterable<EpisodeAttributeValue> $episodeAttributeValues
 */

use App\Model\Entity\EpisodeAttributeValue;
use App\View\AppView;

?>
<div class="episodeAttributeValues index content">
    <?= $this->Html->link(__('New Episode Attribute Value'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Episode Attribute Values') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('episode_id') ?></th>
                <th><?= $this->Paginator->sort('episode_attribute_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($episodeAttributeValues as $episodeAttributeValue): ?>
                <tr>
                    <td><?= $this->Number->format($episodeAttributeValue->id) ?></td>
                    <td><?= $episodeAttributeValue->has('episode') ? $this->Html->link($episodeAttributeValue->episode->id, ['controller' => 'Episodes', 'action' => 'view', $episodeAttributeValue->episode->id]) : '' ?></td>
                    <td><?= $episodeAttributeValue->has('episode_attribute') ? $this->Html->link($episodeAttributeValue->episode_attribute->name, ['controller' => 'EpisodeAttributes', 'action' => 'view', $episodeAttributeValue->episode_attribute->id]) : '' ?></td>
                    <td><?= $episodeAttributeValue->has('user') ? $this->Html->link($episodeAttributeValue->user->name, ['controller' => 'Users', 'action' => 'view', $episodeAttributeValue->user->id]) : '' ?></td>
                    <td><?= h($episodeAttributeValue->created) ?></td>
                    <td><?= h($episodeAttributeValue->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $episodeAttributeValue->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $episodeAttributeValue->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $episodeAttributeValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeAttributeValue->id)]) ?>
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
