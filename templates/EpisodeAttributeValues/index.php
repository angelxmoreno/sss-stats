<?php
/**
 * @var AppView $this
 * @var EpisodeAttributeValue[]|CollectionInterface $episodeAttributeValues
 */

use App\Model\Entity\EpisodeAttributeValue;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'Manage Episode Attribute Values')
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('episode_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('episode_attribute_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('value') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($episodeAttributeValues as $episodeAttributeValue) : ?>
        <tr>
            <td><?= $this->Number->format($episodeAttributeValue->id) ?></td>
            <td><?= $episodeAttributeValue->has('episode') ? $this->Html->link($episodeAttributeValue
                    ->episode->id, ['controller' =>
                    'Episodes', 'action' => 'view', $episodeAttributeValue->episode
                    ->id]) : '' ?>
            </td>
            <td><?= $episodeAttributeValue->has('episode_attribute') ? $this->Html->link($episodeAttributeValue
                    ->episode_attribute->name, ['controller' =>
                    'EpisodeAttributes', 'action' => 'view', $episodeAttributeValue->episode_attribute
                    ->id]) : '' ?>
            </td>
            <td><?= $episodeAttributeValue->has('user') ? $this->Html->link($episodeAttributeValue
                    ->user->name, ['controller' =>
                    'Users', 'action' => 'view', $episodeAttributeValue->user
                    ->id]) : '' ?>
            </td>
            <td><?= h($episodeAttributeValue->value) ?></td>
            <td><?= h($episodeAttributeValue->created) ?></td>
            <td><?= h($episodeAttributeValue->modified) ?></td>
            <td class="actions">
                <?= $this->element('BakeTheme.table_row_actions', ['entity' => $episodeAttributeValue]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
