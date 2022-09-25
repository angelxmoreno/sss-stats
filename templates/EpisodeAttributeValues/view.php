<?php
/**
 * @var AppView $this
 * @var EpisodeAttributeValue $episodeAttributeValue
 */

use App\Model\Entity\EpisodeAttributeValue;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode Attribute Value'), ['action' => 'edit', $episodeAttributeValue->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode Attribute Value'), ['action' => 'delete', $episodeAttributeValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeAttributeValue->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episode Attribute Values'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode Attribute Value'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeAttributeValues view content">
            <h3><?= h($episodeAttributeValue->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Episode') ?></th>
                    <td><?= $episodeAttributeValue->has('episode') ? $this->Html->link($episodeAttributeValue->episode->id, ['controller' => 'Episodes', 'action' => 'view', $episodeAttributeValue->episode->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Episode Attribute') ?></th>
                    <td><?= $episodeAttributeValue->has('episode_attribute') ? $this->Html->link($episodeAttributeValue->episode_attribute->name, ['controller' => 'EpisodeAttributes', 'action' => 'view', $episodeAttributeValue->episode_attribute->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $episodeAttributeValue->has('user') ? $this->Html->link($episodeAttributeValue->user->name, ['controller' => 'Users', 'action' => 'view', $episodeAttributeValue->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episodeAttributeValue->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($episodeAttributeValue->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($episodeAttributeValue->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($episodeAttributeValue->value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
