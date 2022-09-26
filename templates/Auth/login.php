<?php
/**
 * @var AppView $this
 */

use App\View\AppView;

?>
<div class="auth form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Log In') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Log In')); ?>
    <?= $this->Form->end() ?>
</div>
