<?php
/**
 * @var AppView $this
 * @var Film $film
 */

use App\Model\Entity\Film;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('title', 'Film');
$this->assign('identifier', $film->id)
?>


<div class="films view large-9 medium-8 columns content">
    <h4><?= h($film->title) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Episode') ?></th>
                <td><?= $film->has('episode') ?
                        $this->Html->link($film->episode->name
                            , ['controller' => 'Episodes', 'action' => 'view', $film
                                ->episode->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $film->has('user') ?
                        $this->Html->link($film->user->name
                            , ['controller' => 'Users', 'action' => 'view', $film
                                ->user->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Submitter') ?></th>
                <td><?= $film->has('submitter') ?
                        $this->Html->link($film->submitter->name
                            , ['controller' => 'People', 'action' => 'view', $film
                                ->submitter->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Title') ?></th>
                <td><?= h($film->title) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Link') ?></th>
                <td><?= h($film->link) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($film->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($film->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($film->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Directors') ?></h4>
        <?php if (!empty($film->directors)): ?>
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
                    <?php foreach ($film->directors as $directors): ?>
                        <tr>
                            <td><?= h($directors->id) ?></td>
                            <td><?= h($directors->user_id) ?></td>
                            <td><?= h($directors->name) ?></td>
                            <td><?= h($directors->created) ?></td>
                            <td><?= h($directors->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' =>
                                    'view', $directors->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' =>
                                    'edit', $directors->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'People',
                                    'action' => 'delete', $directors->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $directors->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Narrators') ?></h4>
        <?php if (!empty($film->narrators)): ?>
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
                    <?php foreach ($film->narrators as $narrators): ?>
                        <tr>
                            <td><?= h($narrators->id) ?></td>
                            <td><?= h($narrators->user_id) ?></td>
                            <td><?= h($narrators->name) ?></td>
                            <td><?= h($narrators->created) ?></td>
                            <td><?= h($narrators->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' =>
                                    'view', $narrators->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' =>
                                    'edit', $narrators->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'People',
                                    'action' => 'delete', $narrators->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $narrators->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Creators') ?></h4>
        <?php if (!empty($film->creators)): ?>
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
                    <?php foreach ($film->creators as $creators): ?>
                        <tr>
                            <td><?= h($creators->id) ?></td>
                            <td><?= h($creators->user_id) ?></td>
                            <td><?= h($creators->name) ?></td>
                            <td><?= h($creators->created) ?></td>
                            <td><?= h($creators->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' =>
                                    'view', $creators->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' =>
                                    'edit', $creators->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'People',
                                    'action' => 'delete', $creators->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $creators->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Actors') ?></h4>
        <?php if (!empty($film->actors)): ?>
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
                    <?php foreach ($film->actors as $actors): ?>
                        <tr>
                            <td><?= h($actors->id) ?></td>
                            <td><?= h($actors->user_id) ?></td>
                            <td><?= h($actors->name) ?></td>
                            <td><?= h($actors->created) ?></td>
                            <td><?= h($actors->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' =>
                                    'view', $actors->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' =>
                                    'edit', $actors->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'People',
                                    'action' => 'delete', $actors->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $actors->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
