<?php
/**
 * @var AppView $this
 * @var EpisodeAttribute $episodeAttribute
 * @var EpisodeAttributeValue[]|CollectionInterface $episodeAttributeValues
 */

use App\Model\Entity\EpisodeAttribute;
use App\Model\Entity\EpisodeAttributeValue;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/add');
$this->assign('title', 'Add a Episode Attribute');
?>

<div class="episodeAttributes form content">
    <?= $this->Form->create($episodeAttribute) ?>
    <fieldset>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
