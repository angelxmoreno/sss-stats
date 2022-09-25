<?php
/**
 * @var AppView $this
 * @var Episode $episode
 * @var string[]|CollectionInterface $snacks
 */

use App\Model\Entity\Episode;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $episode->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $episode->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Episodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodes form content">
            <?= $this->Form->create($episode) ?>
            <fieldset>
                <legend><?= __('Edit Episode') ?></legend>
                <?php
                echo $this->Form->control('episode_number');
                echo $this->Form->control('snacks._ids', ['options' => $snacks]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
