<?php
/**
 * @var AppView $this
 * @var Episode $episode
 */

use App\Model\Entity\Episode;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode'), ['action' => 'edit', $episode->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode'), ['action' => 'delete', $episode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episode->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodes view content">
            <h3><?= h($episode->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Episode Number') ?></th>
                    <td><?= h($episode->episode_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episode->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($episode->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($episode->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Snacks') ?></h4>
                <?php if (!empty($episode->snacks)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Brand') ?></th>
                                <th><?= __('Type') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($episode->snacks as $snacks) : ?>
                                <tr>
                                    <td><?= h($snacks->id) ?></td>
                                    <td><?= h($snacks->name) ?></td>
                                    <td><?= h($snacks->brand) ?></td>
                                    <td><?= h($snacks->type) ?></td>
                                    <td><?= h($snacks->created) ?></td>
                                    <td><?= h($snacks->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Snacks', 'action' => 'view', $snacks->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Snacks', 'action' => 'edit', $snacks->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Snacks', 'action' => 'delete', $snacks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $snacks->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Episode Attribute Values') ?></h4>
                <?php if (!empty($episode->episode_attribute_values)) : ?>
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
                            <?php foreach ($episode->episode_attribute_values as $episodeAttributeValues) : ?>
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
            <div class="related">
                <h4><?= __('Related Films') ?></h4>
                <?php if (!empty($episode->films)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Episode Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Submitted By') ?></th>
                                <th><?= __('Title') ?></th>
                                <th><?= __('Link') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($episode->films as $films) : ?>
                                <tr>
                                    <td><?= h($films->id) ?></td>
                                    <td><?= h($films->episode_id) ?></td>
                                    <td><?= h($films->user_id) ?></td>
                                    <td><?= h($films->submitted_by) ?></td>
                                    <td><?= h($films->title) ?></td>
                                    <td><?= h($films->link) ?></td>
                                    <td><?= h($films->created) ?></td>
                                    <td><?= h($films->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Films', 'action' => 'view', $films->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Films', 'action' => 'edit', $films->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Films', 'action' => 'delete', $films->id], ['confirm' => __('Are you sure you want to delete # {0}?', $films->id)]) ?>
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
