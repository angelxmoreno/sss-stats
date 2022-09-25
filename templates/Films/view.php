<?php
/**
 * @var AppView $this
 * @var Film $film
 */

use App\Model\Entity\Film;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Film'), ['action' => 'edit', $film->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="films view content">
            <h3><?= h($film->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Episode') ?></th>
                    <td><?= $film->has('episode') ? $this->Html->link($film->episode->id, ['controller' => 'Episodes', 'action' => 'view', $film->episode->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $film->has('user') ? $this->Html->link($film->user->name, ['controller' => 'Users', 'action' => 'view', $film->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Submitter') ?></th>
                    <td><?= $film->has('submitter') ? $this->Html->link($film->submitter->name, ['controller' => 'People', 'action' => 'view', $film->submitter->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($film->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= $this->Number->format($film->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Link') ?></th>
                    <td><?= $this->Number->format($film->link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($film->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($film->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related People') ?></h4>
                <?php if (!empty($film->directors)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($film->directors as $directors) : ?>
                                <tr>
                                    <td><?= h($directors->id) ?></td>
                                    <td><?= h($directors->user_id) ?></td>
                                    <td><?= h($directors->name) ?></td>
                                    <td><?= h($directors->created) ?></td>
                                    <td><?= h($directors->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' => 'view', $directors->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' => 'edit', $directors->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'People', 'action' => 'delete', $directors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $directors->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related People') ?></h4>
                <?php if (!empty($film->narrators)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($film->narrators as $narrators) : ?>
                                <tr>
                                    <td><?= h($narrators->id) ?></td>
                                    <td><?= h($narrators->user_id) ?></td>
                                    <td><?= h($narrators->name) ?></td>
                                    <td><?= h($narrators->created) ?></td>
                                    <td><?= h($narrators->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' => 'view', $narrators->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' => 'edit', $narrators->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'People', 'action' => 'delete', $narrators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $narrators->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related People') ?></h4>
                <?php if (!empty($film->creators)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($film->creators as $creators) : ?>
                                <tr>
                                    <td><?= h($creators->id) ?></td>
                                    <td><?= h($creators->user_id) ?></td>
                                    <td><?= h($creators->name) ?></td>
                                    <td><?= h($creators->created) ?></td>
                                    <td><?= h($creators->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' => 'view', $creators->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' => 'edit', $creators->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'People', 'action' => 'delete', $creators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creators->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related People') ?></h4>
                <?php if (!empty($film->actors)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($film->actors as $actors) : ?>
                                <tr>
                                    <td><?= h($actors->id) ?></td>
                                    <td><?= h($actors->user_id) ?></td>
                                    <td><?= h($actors->name) ?></td>
                                    <td><?= h($actors->created) ?></td>
                                    <td><?= h($actors->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' => 'view', $actors->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' => 'edit', $actors->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'People', 'action' => 'delete', $actors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actors->id)]) ?>
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
