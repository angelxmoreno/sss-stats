<?php
/**
 * @var AppView $this
 * @var EpisodeAttributeValue $episodeAttributeValue
 * @var Episode[]|CollectionInterface $episodes
 * @var EpisodeAttribute[]|CollectionInterface $episodeAttributes
 * @var User[]|CollectionInterface $users
 */

use App\Model\Entity\Episode;
use App\Model\Entity\EpisodeAttribute;
use App\Model\Entity\EpisodeAttributeValue;
use App\Model\Entity\User;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/edit');
$this->assign('title', 'Edit a Episode Attribute Value');
$this->assign('identifier', $episodeAttributeValue->id)
?>

<div class="episodeAttributeValues form content">
    <?= $this->Form->create($episodeAttributeValue) ?>
    <fieldset>
        <?php
        echo $this->Form->control('episode_id', ['options' => $episodes]);
        echo $this->Form->control('episode_attribute_id', ['options' => $episodeAttributes]);
        echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
