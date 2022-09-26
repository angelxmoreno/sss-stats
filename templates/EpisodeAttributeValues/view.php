<?php
/**
 * @var AppView $this
 * @var EpisodeAttributeValue $episodeAttributeValue
 */

use App\Model\Entity\EpisodeAttributeValue;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('title', 'Episode Attribute Value');
$this->assign('identifier', $episodeAttributeValue->id)
?>


<div class="episodeAttributeValues view large-9 medium-8 columns content">
    <h4><?= h($episodeAttributeValue->id) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Episode') ?></th>
                <td><?= $episodeAttributeValue->has('episode') ?
                        $this->Html->link($episodeAttributeValue->episode->name
                            , ['controller' => 'Episodes', 'action' => 'view', $episodeAttributeValue
                                ->episode->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Episode Attribute') ?></th>
                <td><?= $episodeAttributeValue->has('episode_attribute') ?
                        $this->Html->link($episodeAttributeValue->episode_attribute->name
                            , ['controller' => 'EpisodeAttributes', 'action' => 'view', $episodeAttributeValue
                                ->episode_attribute->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $episodeAttributeValue->has('user') ?
                        $this->Html->link($episodeAttributeValue->user->name
                            , ['controller' => 'Users', 'action' => 'view', $episodeAttributeValue
                                ->user->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($episodeAttributeValue->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($episodeAttributeValue->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($episodeAttributeValue->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="text">
        <h4><?= __('Value') ?></h4>
        <?= $this->Text->autoParagraph(h($episodeAttributeValue->value)); ?>
    </div>
</div>
