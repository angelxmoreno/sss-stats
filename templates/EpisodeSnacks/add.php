<?php
/**
 * @var AppView $this
 * @var EpisodeSnack $episodeSnack
 * @var CollectionInterface|string[] $episodes
 * @var CollectionInterface|string[] $snacks
 * @var CollectionInterface|string[] $users
 */

use App\Model\Entity\EpisodeSnack;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Episode Snacks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeSnacks form content">
            <?= $this->Form->create($episodeSnack) ?>
            <fieldset>
                <legend><?= __('Add Episode Snack') ?></legend>
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
