<?php
/**
 * @var AppView $this
 * @var FilmPerson[]|CollectionInterface $filmPeople
 */

use App\Model\Entity\FilmPerson;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Manage Film People')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('person_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('film_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('type') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($filmPeople as $filmPerson) : ?>
        <tr>
            <td><?= $this->Number->format($filmPerson->id) ?></td>
            <td><?= $filmPerson->has('person') ? $this->Html->link($filmPerson
                    ->person->name, ['controller' =>
                    'People', 'action' => 'view', $filmPerson->person
                    ->id]) : '' ?>
            </td>
            <td><?= $filmPerson->has('film') ? $this->Html->link($filmPerson
                    ->film->title, ['controller' =>
                    'Films', 'action' => 'view', $filmPerson->film
                    ->id]) : '' ?>
            </td>
            <td><?= $filmPerson->has('user') ? $this->Html->link($filmPerson
                    ->user->name, ['controller' =>
                    'Users', 'action' => 'view', $filmPerson->user
                    ->id]) : '' ?>
            </td>
            <td><?= h($filmPerson->type) ?></td>
            <td><?= h($filmPerson->created) ?></td>
            <td><?= h($filmPerson->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $filmPerson]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
