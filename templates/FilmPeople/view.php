<?php
/**
 * @var AppView $this
 * @var FilmPerson $filmPerson
 */

use App\Model\Entity\FilmPerson;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('title', 'View Film Person');
$this->assign('identifier', $filmPerson->id)
?>


<div class="filmPeople view large-9 medium-8 columns content">
    <h4><?= h($filmPerson->id) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Person') ?></th>
                <td><?= $filmPerson->has('person') ?
                        $this->Html->link($filmPerson->person->name
                            , ['controller' => 'People', 'action' => 'view', $filmPerson
                                ->person->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Film') ?></th>
                <td><?= $filmPerson->has('film') ?
                        $this->Html->link($filmPerson->film->title
                            , ['controller' => 'Films', 'action' => 'view', $filmPerson
                                ->film->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $filmPerson->has('user') ?
                        $this->Html->link($filmPerson->user->name
                            , ['controller' => 'Users', 'action' => 'view', $filmPerson
                                ->user->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Type') ?></th>
                <td><?= h($filmPerson->type) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($filmPerson->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($filmPerson->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($filmPerson->modified) ?></td>
            </tr>
        </table>
    </div>
</div>
