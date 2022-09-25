<?php
/**
 * @var AppView $this
 * @var EpisodeAttributeValue $episodeAttributeValue
 * @var string[]|CollectionInterface $episodes
 * @var string[]|CollectionInterface $episodeAttributes
 * @var string[]|CollectionInterface $users
 */

use App\Model\Entity\EpisodeAttributeValue;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $episodeAttributeValue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $episodeAttributeValue->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Episode Attribute Values'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeAttributeValues form content">
            <?= $this->Form->create($episodeAttributeValue) ?>
            <fieldset>
                <legend><?= __('Edit Episode Attribute Value') ?></legend>
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
