<?php
/**
 * @var AppView $this
 * @var EpisodeSnack $episodeSnack
 * @var string[]|CollectionInterface $episodes
 * @var string[]|CollectionInterface $snacks
 * @var string[]|CollectionInterface $users
 */

use App\Model\Entity\EpisodeSnack;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $episodeSnack->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $episodeSnack->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Episode Snacks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeSnacks form content">
            <?= $this->Form->create($episodeSnack) ?>
            <fieldset>
                <legend><?= __('Edit Episode Snack') ?></legend>
                <?php
                echo $this->Form->control('episode_id', ['options' => $episodes]);
                echo $this->Form->control('snack_id', ['options' => $snacks]);
                echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
