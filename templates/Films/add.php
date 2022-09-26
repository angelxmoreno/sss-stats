<?php
/**
 * @var AppView $this
 * @var Film $film
 * @var Episode[]|CollectionInterface $episodes
 * @var User[]|CollectionInterface $users
 * @var Submitter[]|CollectionInterface $submitter
 * @var Director[]|CollectionInterface $directors
 * @var Narrator[]|CollectionInterface $narrators
 * @var Creator[]|CollectionInterface $creators
 * @var Actor[]|CollectionInterface $actors
 */

use App\Model\Entity\Actor;
use App\Model\Entity\Creator;
use App\Model\Entity\Director;
use App\Model\Entity\Episode;
use App\Model\Entity\Film;
use App\Model\Entity\Narrator;
use App\Model\Entity\Submitter;
use App\Model\Entity\User;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/add');
$this->assign('title', 'Add a Film');
?>

<div class="films form content">
    <?= $this->Form->create($film) ?>
    <fieldset>
        <?php
        echo $this->Form->control('episode_id', ['options' => $episodes]);
        echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('submitted_by', ['options' => $submitter]);
        echo $this->Form->control('title');
        echo $this->Form->control('link');
        echo $this->Form->control('directors._ids', ['options' => $directors]);
        echo $this->Form->control('narrators._ids', ['options' => $narrators]);
        echo $this->Form->control('creators._ids', ['options' => $creators]);
        echo $this->Form->control('actors._ids', ['options' => $actors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
