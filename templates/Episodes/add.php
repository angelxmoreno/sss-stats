<?php
/**
 * @var AppView $this
 * @var Episode $episode
 * @var EpisodeAttributeValue[]|CollectionInterface $episodeAttributeValues
 * @var Film[]|CollectionInterface $films
 * @var Snack[]|CollectionInterface $snacks
 */

use App\Model\Entity\Episode;
use App\Model\Entity\EpisodeAttributeValue;
use App\Model\Entity\Film;
use App\Model\Entity\Snack;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/add');
$this->assign('title', 'Add a Episode');
?>

<div class="episodes form content">
    <?= $this->Form->create($episode) ?>
    <fieldset>
        <?php
        echo $this->Form->control('episode_number');
        echo $this->Form->control('snacks._ids', ['options' => $snacks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
