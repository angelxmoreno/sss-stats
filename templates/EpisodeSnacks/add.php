<?php
/**
 * @var AppView $this
 * @var EpisodeSnack $episodeSnack
 * @var Episode[]|CollectionInterface $episodes
 * @var Snack[]|CollectionInterface $snacks
 * @var User[]|CollectionInterface $users
 */

use App\Model\Entity\Episode;
use App\Model\Entity\EpisodeSnack;
use App\Model\Entity\Snack;
use App\Model\Entity\User;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/add');
$this->assign('title', 'Add a Episode Snack');
?>

<div class="episodeSnacks form content">
    <?= $this->Form->create($episodeSnack) ?>
    <fieldset>
        <?php
        echo $this->Form->control('episode_id', ['options' => $episodes]);
        echo $this->Form->control('snack_id', ['options' => $snacks]);
        echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
