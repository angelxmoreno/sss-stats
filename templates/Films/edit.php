<?php
/**
 * @var AppView $this
 * @var Film $film
 * @var string[]|CollectionInterface $episodes
 * @var string[]|CollectionInterface $users
 * @var string[]|CollectionInterface $submitter
 * @var string[]|CollectionInterface $directors
 * @var string[]|CollectionInterface $narrators
 * @var string[]|CollectionInterface $creators
 * @var string[]|CollectionInterface $actors
 */

use App\Model\Entity\Film;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $film->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $film->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="films form content">
            <?= $this->Form->create($film) ?>
            <fieldset>
                <legend><?= __('Edit Film') ?></legend>
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
