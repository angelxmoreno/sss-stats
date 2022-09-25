<?php
/**
 * @var AppView $this
 * @var Person $person
 */

use App\Model\Entity\Person;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people view content">
            <h3><?= h($person->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $person->has('user') ? $this->Html->link($person->user->name, ['controller' => 'Users', 'action' => 'view', $person->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($person->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($person->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($person->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Film People') ?></h4>
                <?php if (!empty($person->film_people)) : ?>
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
                            <?php foreach ($person->film_people as $filmPeople) : ?>
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
        </div>
    </div>
</div>
