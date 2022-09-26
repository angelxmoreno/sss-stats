<?php
/**
 * @var AppView $this
 * @var Person $person
 */

use App\Model\Entity\Person;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('title', 'Person');
$this->assign('identifier', $person->id)
?>


<div class="people view large-9 medium-8 columns content">
    <h4><?= h($person->name) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $person->has('user') ?
                        $this->Html->link($person->user->name
                            , ['controller' => 'Users', 'action' => 'view', $person
                                ->user->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($person->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($person->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($person->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($person->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Film People') ?></h4>
        <?php if (!empty($person->film_people)): ?>
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
                    <?php foreach ($person->film_people as $filmPeople): ?>
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
</div>
