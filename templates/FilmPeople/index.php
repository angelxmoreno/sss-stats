<?php
/**
 * @var AppView $this
 * @var iterable<FilmPerson> $filmPeople
 */

use App\Model\Entity\FilmPerson;
use App\View\AppView;

?>
<div class="filmPeople index content">
    <?= $this->Html->link(__('New Film Person'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Film People') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('person_id') ?></th>
                <th><?= $this->Paginator->sort('film_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($filmPeople as $filmPerson): ?>
                <tr>
                    <td><?= $this->Number->format($filmPerson->id) ?></td>
                    <td><?= $filmPerson->has('person') ? $this->Html->link($filmPerson->person->name, ['controller' => 'People', 'action' => 'view', $filmPerson->person->id]) : '' ?></td>
                    <td><?= $filmPerson->has('film') ? $this->Html->link($filmPerson->film->title, ['controller' => 'Films', 'action' => 'view', $filmPerson->film->id]) : '' ?></td>
                    <td><?= $filmPerson->has('user') ? $this->Html->link($filmPerson->user->name, ['controller' => 'Users', 'action' => 'view', $filmPerson->user->id]) : '' ?></td>
                    <td><?= h($filmPerson->type) ?></td>
                    <td><?= h($filmPerson->created) ?></td>
                    <td><?= h($filmPerson->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filmPerson->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filmPerson->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filmPerson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filmPerson->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
