<?php
/**
 * @var AppView $this
 * @var Snack $snack
 * @var CollectionInterface|string[] $episodes
 */

use App\Model\Entity\Snack;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Snacks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="snacks form content">
            <?= $this->Form->create($snack) ?>
            <fieldset>
                <legend><?= __('Add Snack') ?></legend>
                <?php
                echo $this->Form->control('name');
                echo $this->Form->control('brand');
                echo $this->Form->control('type');
                echo $this->Form->control('episodes._ids', ['options' => $episodes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
