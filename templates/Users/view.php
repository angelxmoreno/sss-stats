<?php
/**
 * @var AppView $this
 * @var User $user
 */

use App\Model\Entity\User;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Episode Attribute Values') ?></h4>
                <?php if (!empty($user->episode_attribute_values)) : ?>
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
                            <?php foreach ($user->episode_attribute_values as $episodeAttributeValues) : ?>
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
                <h4><?= __('Related Episode Snacks') ?></h4>
                <?php if (!empty($user->episode_snacks)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Episode Id') ?></th>
                                <th><?= __('Snack Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->episode_snacks as $episodeSnacks) : ?>
                                <tr>
                                    <td><?= h($episodeSnacks->id) ?></td>
                                    <td><?= h($episodeSnacks->episode_id) ?></td>
                                    <td><?= h($episodeSnacks->snack_id) ?></td>
                                    <td><?= h($episodeSnacks->user_id) ?></td>
                                    <td><?= h($episodeSnacks->created) ?></td>
                                    <td><?= h($episodeSnacks->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'EpisodeSnacks', 'action' => 'view', $episodeSnacks->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'EpisodeSnacks', 'action' => 'edit', $episodeSnacks->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'EpisodeSnacks', 'action' => 'delete', $episodeSnacks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeSnacks->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Film People') ?></h4>
                <?php if (!empty($user->film_people)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Person Id') ?></th>
                                <th><?= __('Film Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Type') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->film_people as $filmPeople) : ?>
                                <tr>
                                    <td><?= h($filmPeople->id) ?></td>
                                    <td><?= h($filmPeople->person_id) ?></td>
                                    <td><?= h($filmPeople->film_id) ?></td>
                                    <td><?= h($filmPeople->user_id) ?></td>
                                    <td><?= h($filmPeople->type) ?></td>
                                    <td><?= h($filmPeople->created) ?></td>
                                    <td><?= h($filmPeople->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'FilmPeople', 'action' => 'view', $filmPeople->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'FilmPeople', 'action' => 'edit', $filmPeople->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'FilmPeople', 'action' => 'delete', $filmPeople->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filmPeople->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Films') ?></h4>
                <?php if (!empty($user->films)) : ?>
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
                            <?php foreach ($user->films as $films) : ?>
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
            <div class="related">
                <h4><?= __('Related People') ?></h4>
                <?php if (!empty($user->people)) : ?>
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
                            <?php foreach ($user->people as $people) : ?>
                                <tr>
                                    <td><?= h($people->id) ?></td>
                                    <td><?= h($people->user_id) ?></td>
                                    <td><?= h($people->name) ?></td>
                                    <td><?= h($people->created) ?></td>
                                    <td><?= h($people->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' => 'view', $people->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' => 'edit', $people->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'People', 'action' => 'delete', $people->id], ['confirm' => __('Are you sure you want to delete # {0}?', $people->id)]) ?>
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
