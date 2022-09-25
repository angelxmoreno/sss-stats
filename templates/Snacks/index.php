<?php
/**
 * @var AppView $this
 * @var Snack[]|CollectionInterface $snacks
 */

use App\Model\Entity\Snack;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Manage Snacks')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('brand') ?></th>
        <th scope="col"><?= $this->Paginator->sort('type') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($snacks as $snack) : ?>
        <tr>
            <td><?= $this->Number->format($snack->id) ?></td>
            <td><?= h($snack->name) ?></td>
            <td><?= h($snack->brand) ?></td>
            <td><?= h($snack->type) ?></td>
            <td><?= h($snack->created) ?></td>
            <td><?= h($snack->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $snack]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
