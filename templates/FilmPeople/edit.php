<?php
/**
 * @var AppView $this
 * @var FilmPerson $filmPerson
 * @var Person[]|CollectionInterface $people
 * @var Film[]|CollectionInterface $films
 * @var User[]|CollectionInterface $users
 */

use App\Model\Entity\Film;
use App\Model\Entity\FilmPerson;
use App\Model\Entity\Person;
use App\Model\Entity\User;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/edit');
$this->assign('title', 'Edit a Film Person');
$this->assign('identifier', $filmPerson->id)
?>

<div class="filmPeople form content">
    <?= $this->Form->create($filmPerson) ?>
    <fieldset>
        <?php
        echo $this->Form->control('person_id', ['options' => $people]);
        echo $this->Form->control('film_id', ['options' => $films]);
        echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
