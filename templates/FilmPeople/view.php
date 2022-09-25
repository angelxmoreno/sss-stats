<?php
/**
 * @var AppView $this
 * @var FilmPerson $filmPerson
 */

use App\Model\Entity\FilmPerson;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Film Person'), ['action' => 'edit', $filmPerson->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film Person'), ['action' => 'delete', $filmPerson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filmPerson->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Film People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmPeople view content">
            <h3><?= h($filmPerson->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $filmPerson->has('person') ? $this->Html->link($filmPerson->person->name, ['controller' => 'People', 'action' => 'view', $filmPerson->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $filmPerson->has('film') ? $this->Html->link($filmPerson->film->title, ['controller' => 'Films', 'action' => 'view', $filmPerson->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $filmPerson->has('user') ? $this->Html->link($filmPerson->user->name, ['controller' => 'Users', 'action' => 'view', $filmPerson->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($filmPerson->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($filmPerson->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($filmPerson->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($filmPerson->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
