<?php
/**
 * @var AppView $this
 * @var Film $film
 * @var CollectionInterface|string[] $episodes
 * @var CollectionInterface|string[] $users
 * @var CollectionInterface|string[] $submitter
 * @var CollectionInterface|string[] $directors
 * @var CollectionInterface|string[] $narrators
 * @var CollectionInterface|string[] $creators
 * @var CollectionInterface|string[] $actors
 */

use App\Model\Entity\Film;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="films form content">
            <?= $this->Form->create($film) ?>
            <fieldset>
                <legend><?= __('Add Film') ?></legend>
                <?php
                echo $this->Form->control('episode_id', ['options' => $episodes]);
                echo $this->Form->control('user_id', ['options' => $users]);
                echo $this->Form->control('submitted_by', ['options' => $submitter]);
                echo $this->Form->control('title');
                echo $this->Form->control('link');
                echo $this->Form->control('directors._ids', ['options' => $directors]);
                echo $this->Form->control('narrators._ids', ['options' => $narrators]);
                echo $this->Form->control('creators._ids', ['options' => $creators]);
                echo $this->Form->control('actors._ids', ['options' => $actors]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
