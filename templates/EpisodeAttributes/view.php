<?php
/**
 * @var AppView $this
 * @var EpisodeAttribute $episodeAttribute
 */

use App\Model\Entity\EpisodeAttribute;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode Attribute'), ['action' => 'edit', $episodeAttribute->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode Attribute'), ['action' => 'delete', $episodeAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeAttribute->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episode Attributes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode Attribute'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeAttributes view content">
            <h3><?= h($episodeAttribute->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($episodeAttribute->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($episodeAttribute->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episodeAttribute->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($episodeAttribute->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($episodeAttribute->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Episode Attribute Values') ?></h4>
                <?php if (!empty($episodeAttribute->episode_attribute_values)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Episode Id') ?></th>
                                <th><?= __('Episode Attribute Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Value') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($episodeAttribute->episode_attribute_values as $episodeAttributeValues) : ?>
                                <tr>
                                    <td><?= h($episodeAttributeValues->id) ?></td>
                                    <td><?= h($episodeAttributeValues->episode_id) ?></td>
                                    <td><?= h($episodeAttributeValues->episode_attribute_id) ?></td>
                                    <td><?= h($episodeAttributeValues->user_id) ?></td>
                                    <td><?= h($episodeAttributeValues->value) ?></td>
                                    <td><?= h($episodeAttributeValues->created) ?></td>
                                    <td><?= h($episodeAttributeValues->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'EpisodeAttributeValues', 'action' => 'view', $episodeAttributeValues->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'EpisodeAttributeValues', 'action' => 'edit', $episodeAttributeValues->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'EpisodeAttributeValues', 'action' => 'delete', $episodeAttributeValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeAttributeValues->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
