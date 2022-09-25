<?php
/**
 * @var AppView $this
 * @var EpisodeAttributeValue $episodeAttributeValue
 * @var CollectionInterface|string[] $episodes
 * @var CollectionInterface|string[] $episodeAttributes
 * @var CollectionInterface|string[] $users
 */

use App\Model\Entity\EpisodeAttributeValue;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Episode Attribute Values'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeAttributeValues form content">
            <?= $this->Form->create($episodeAttributeValue) ?>
            <fieldset>
                <legend><?= __('Add Episode Attribute Value') ?></legend>
                <?php
                echo $this->Form->control('episode_id', ['options' => $episodes]);
                echo $this->Form->control('episode_attribute_id', ['options' => $episodeAttributes]);
                echo $this->Form->control('user_id', ['options' => $users]);
                echo $this->Form->control('value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
