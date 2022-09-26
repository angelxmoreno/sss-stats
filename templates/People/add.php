<?php
/**
 * @var AppView $this
 * @var Person $person
 * @var User[]|CollectionInterface $users
 * @var FilmPerson[]|CollectionInterface $filmPeople
 */

use App\Model\Entity\FilmPerson;
use App\Model\Entity\Person;
use App\Model\Entity\User;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/add');
$this->assign('title', 'Add a Person');
?>

<div class="people form content">
    <?= $this->Form->create($person) ?>
    <fieldset>
        <?php
        echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
