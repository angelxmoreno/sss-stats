<?php
/**
 * @var AppView $this
 * @var EpisodeAttribute $episodeAttribute
 */

use App\Model\Entity\EpisodeAttribute;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('title', 'Episode Attribute');
$this->assign('identifier', $episodeAttribute->id)
?>


<div class="episodeAttributes view large-9 medium-8 columns content">
    <h4><?= h($episodeAttribute->name) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($episodeAttribute->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Type') ?></th>
                <td><?= h($episodeAttribute->type) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($episodeAttribute->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($episodeAttribute->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($episodeAttribute->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Episode Attribute Values') ?></h4>
        <?php if (!empty($episodeAttribute->episode_attribute_values)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Episode Id') ?></th>
                        <th scope="col"><?= __('Episode Attribute Id') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Value') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($episodeAttribute->episode_attribute_values as $episodeAttributeValues): ?>
                        <tr>
                            <td><?= h($episodeAttributeValues->id) ?></td>
                            <td><?= h($episodeAttributeValues->episode_id) ?></td>
                            <td><?= h($episodeAttributeValues->episode_attribute_id) ?></td>
                            <td><?= h($episodeAttributeValues->user_id) ?></td>
                            <td><?= h($episodeAttributeValues->value) ?></td>
                            <td><?= h($episodeAttributeValues->created) ?></td>
                            <td><?= h($episodeAttributeValues->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EpisodeAttributeValues', 'action' =>
                                    'view', $episodeAttributeValues->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EpisodeAttributeValues', 'action' =>
                                    'edit', $episodeAttributeValues->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EpisodeAttributeValues',
                                    'action' => 'delete', $episodeAttributeValues->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $episodeAttributeValues->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
