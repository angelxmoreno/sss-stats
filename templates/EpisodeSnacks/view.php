<?php
/**
 * @var AppView $this
 * @var EpisodeSnack $episodeSnack
 */

use App\Model\Entity\EpisodeSnack;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('title', 'Episode Snack');
$this->assign('identifier', $episodeSnack->id)
?>


<div class="episodeSnacks view large-9 medium-8 columns content">
    <h4><?= h($episodeSnack->id) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Episode') ?></th>
                <td><?= $episodeSnack->has('episode') ?
                        $this->Html->link($episodeSnack->episode->name
                            , ['controller' => 'Episodes', 'action' => 'view', $episodeSnack
                                ->episode->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Snack') ?></th>
                <td><?= $episodeSnack->has('snack') ?
                        $this->Html->link($episodeSnack->snack->name
                            , ['controller' => 'Snacks', 'action' => 'view', $episodeSnack
                                ->snack->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $episodeSnack->has('user') ?
                        $this->Html->link($episodeSnack->user->name
                            , ['controller' => 'Users', 'action' => 'view', $episodeSnack
                                ->user->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($episodeSnack->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($episodeSnack->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($episodeSnack->modified) ?></td>
            </tr>
        </table>
    </div>
</div>
