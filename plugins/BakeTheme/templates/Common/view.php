<?php
/**
 * @var App\View\AppView $this
 */
$this->extend('BakeTheme.Common/base');
?>
<?= $this->fetch('identifier') ? $this->element('BakeTheme.page_controls', ['mode' => 'view', 'identifier' => $this->fetch('identifier')]) : null ?>
<?= $this->fetch('content') ?>
