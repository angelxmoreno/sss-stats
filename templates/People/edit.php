<?php
/**
 * @var AppView $this
 * @var Person $person
 * @var string[]|CollectionInterface $users
 */

use App\Model\Entity\Person;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $person->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend><?= __('Edit Person') ?></legend>
                <?php
                echo $this->Form->control('user_id', ['options' => $users]);
                echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
