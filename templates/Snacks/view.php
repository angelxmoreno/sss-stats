<?php
/**
 * @var AppView $this
 * @var Snack $snack
 */

use App\Model\Entity\Snack;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('title', 'Snack');
$this->assign('identifier', $snack->id)
?>


<div class="snacks view large-9 medium-8 columns content">
    <h4><?= h($snack->name) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($snack->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Brand') ?></th>
                <td><?= h($snack->brand) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Type') ?></th>
                <td><?= h($snack->type) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($snack->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($snack->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($snack->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Episodes') ?></h4>
        <?php if (!empty($snack->episodes)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Episode Number') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($snack->episodes as $episodes): ?>
                        <tr>
                            <td><?= h($episodes->id) ?></td>
                            <td><?= h($episodes->episode_number) ?></td>
                            <td><?= h($episodes->created) ?></td>
                            <td><?= h($episodes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Episodes', 'action' =>
                                    'view', $episodes->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Episodes', 'action' =>
                                    'edit', $episodes->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Episodes',
                                    'action' => 'delete', $episodes->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $episodes->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
