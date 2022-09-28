<?php
/**
 * @var AppView $this
 */

use App\View\AppView;

?>
<?= $this->Html->link($this->Html->icon('envelope') . ' Messages', [
    'prefix' => false,
    'plugin' => 'DirectMessages',
    'controller' => 'MessageThreads',
    'action' => 'index',
], ['escape' => false, 'class' => 'btn btn-primary']) ?>
