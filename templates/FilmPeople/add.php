<?php
/**
 * @var AppView $this
 * @var FilmPerson $filmPerson
 * @var CollectionInterface|string[] $people
 * @var CollectionInterface|string[] $films
 * @var CollectionInterface|string[] $users
 */

use App\Model\Entity\FilmPerson;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Film People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmPeople form content">
            <?= $this->Form->create($filmPerson) ?>
            <fieldset>
                <legend><?= __('Add Film Person') ?></legend>
                <?php
                echo $this->Form->control('person_id', ['options' => $people]);
                echo $this->Form->control('film_id', ['options' => $films]);
                echo $this->Form->control('user_id', ['options' => $users]);
                echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
