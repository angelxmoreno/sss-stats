<?php
/**
 * @var App\View\AppView $this
 */
$this->extend('BakeTheme.Common/base');
?>
<?= $this->element('BakeTheme.page_controls', ['mode' => 'create', 'identifier' => $this->fetch('identifier')]) ?>
<?= $this->fetch('content') ?>
