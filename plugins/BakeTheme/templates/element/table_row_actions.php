<?php
/**
 * @var AppView $this
 * @var EntityInterface $entity
 */

use App\View\AppView;
use Cake\Datasource\EntityInterface;

?>
<div class="btn-group btn-group-sm" role="group">
    <?= $this->Html->link(__('View'), ['action' => 'view', $entity->id], ['title' => __('View'), 'class' => 'btn btn-outline-success']) ?>
    <? //= $this->Html->link(__('Edit'), ['action' => 'edit', $entity->id], ['title' => __('Edit'), 'class' => 'btn btn-outline-warning']) ?>
    <? //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $entity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entity->id), 'title' => __('Delete'), 'class' => 'btn btn-outline-danger']) ?>
</div>

