<?php
/**
 * @var AppView $this
 * @var Snack $snack
 * @var Episode[]|CollectionInterface $episodes
 */

use App\Model\Entity\Episode;
use App\Model\Entity\Snack;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/edit');
$this->assign('title', 'Edit a Snack');
$this->assign('identifier', $snack->id)
?>

<div class="snacks form content">
    <?= $this->Form->create($snack) ?>
    <fieldset>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('brand');
        echo $this->Form->control('type');
        echo $this->Form->control('episodes._ids', ['options' => $episodes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
