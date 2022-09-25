<?php
/**
 * @var AppView $this
 * @var EpisodeAttribute $episodeAttribute
 */

use App\Model\Entity\EpisodeAttribute;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $episodeAttribute->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $episodeAttribute->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Episode Attributes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeAttributes form content">
            <?= $this->Form->create($episodeAttribute) ?>
            <fieldset>
                <legend><?= __('Edit Episode Attribute') ?></legend>
                <?php
                echo $this->Form->control('name');
                echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
