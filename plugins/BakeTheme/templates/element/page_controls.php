<?php
/**
 * @var AppView $this
 * @var string $identifier
 * @var string $mode
 */

use App\View\AppView;

?>
<div class="btn-group btn-group-sm mb-2" role="group">
    <?= $mode !== 'create' ? $this->Html->link(__('Create'), ['action' => 'add'], ['title' => __('Create'), 'class' => 'btn btn-success']) : '' ?>
    <?= $mode !== 'list' ? $this->Html->link(__('List'), ['action' => 'index'], ['title' => __('List'), 'class' => 'btn btn-outline-info']) : '' ?>
    <?= $mode !== 'create' && $mode !== 'list' && $mode !== 'view' ? $this->Html->link(__('View'), ['action' => 'view', $identifier], ['title' => __('View'), 'class' => 'btn btn-outline-success']) : '' ?>
    <?= $mode !== 'create' && $mode !== 'list' && $mode !== 'edit' ? $this->Html->link(__('Edit'), ['action' => 'edit', $identifier], ['title' => __('Edit'), 'class' => 'btn btn-outline-warning']) : '' ?>
    <?= false && $mode !== 'create' && $mode !== 'list' ? $this->Form->postLink(__('Delete'), ['action' => 'delete', $identifier], ['confirm' => __('Are you sure you want to delete # {0}?', $identifier), 'title' => __('Delete'), 'class' => 'btn btn-outline-danger']) : '' ?>
</div>

