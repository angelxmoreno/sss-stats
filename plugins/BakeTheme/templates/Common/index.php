<?php
/**
 * @var App\View\AppView $this
 */
$this->extend('BakeTheme.Common/base');
?>

<?= $this->fetch('page_controls', $this->element('BakeTheme.page_controls', ['mode' => 'list', 'identifier' => $this->fetch('identifier')])) ?>
<?= $this->element('BakeTheme.pagination') ?>
<?= $this->fetch('content') ?>
<?= $this->element('BakeTheme.pagination') ?>
