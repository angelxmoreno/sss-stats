<?php
/**
 * @var App\View\AppView $this
 */
?>
<?php if ($this->fetch('title')) : ?>
    <h1><?= $this->fetch('title') ?></h1>
<?php endif; ?>
<?= $this->fetch('titleBlock', '') ?>
<?= $this->fetch('content') ?>
