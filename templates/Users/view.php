<?php
/**
 * @var AppView $this
 * @var User $user
 */

use App\Model\Entity\User;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('title', 'View User');
$this->assign('identifier', $user->id)
?>


<div class="users view large-9 medium-8 columns content">
    <h4><?= h($user->name) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($user->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($user->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Episode Attribute Values') ?></h4>
        <?php if (!empty($user->episode_attribute_values)): ?>
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
                    <?php foreach ($user->episode_attribute_values as $episodeAttributeValues): ?>
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
    <div class="related">
        <h4><?= __('Related Episode Snacks') ?></h4>
        <?php if (!empty($user->episode_snacks)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Episode Id') ?></th>
                        <th scope="col"><?= __('Snack Id') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($user->episode_snacks as $episodeSnacks): ?>
                        <tr>
                            <td><?= h($episodeSnacks->id) ?></td>
                            <td><?= h($episodeSnacks->episode_id) ?></td>
                            <td><?= h($episodeSnacks->snack_id) ?></td>
                            <td><?= h($episodeSnacks->user_id) ?></td>
                            <td><?= h($episodeSnacks->created) ?></td>
                            <td><?= h($episodeSnacks->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EpisodeSnacks', 'action' =>
                                    'view', $episodeSnacks->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EpisodeSnacks', 'action' =>
                                    'edit', $episodeSnacks->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EpisodeSnacks',
                                    'action' => 'delete', $episodeSnacks->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $episodeSnacks->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Film People') ?></h4>
        <?php if (!empty($user->film_people)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Person Id') ?></th>
                        <th scope="col"><?= __('Film Id') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Type') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($user->film_people as $filmPeople): ?>
                        <tr>
                            <td><?= h($filmPeople->id) ?></td>
                            <td><?= h($filmPeople->person_id) ?></td>
                            <td><?= h($filmPeople->film_id) ?></td>
                            <td><?= h($filmPeople->user_id) ?></td>
                            <td><?= h($filmPeople->type) ?></td>
                            <td><?= h($filmPeople->created) ?></td>
                            <td><?= h($filmPeople->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FilmPeople', 'action' =>
                                    'view', $filmPeople->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FilmPeople', 'action' =>
                                    'edit', $filmPeople->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FilmPeople',
                                    'action' => 'delete', $filmPeople->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $filmPeople->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Films') ?></h4>
        <?php if (!empty($user->films)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Episode Id') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Submitted By') ?></th>
                        <th scope="col"><?= __('Title') ?></th>
                        <th scope="col"><?= __('Link') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($user->films as $films): ?>
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
                                <?= $this->Html->link(__('View'), ['controller' => 'Films', 'action' =>
                                    'view', $films->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Films', 'action' =>
                                    'edit', $films->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Films',
                                    'action' => 'delete', $films->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $films->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related People') ?></h4>
        <?php if (!empty($user->people)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Name') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($user->people as $people): ?>
                        <tr>
                            <td><?= h($people->id) ?></td>
                            <td><?= h($people->user_id) ?></td>
                            <td><?= h($people->name) ?></td>
                            <td><?= h($people->created) ?></td>
                            <td><?= h($people->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' =>
                                    'view', $people->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' =>
                                    'edit', $people->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'People',
                                    'action' => 'delete', $people->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $people->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
