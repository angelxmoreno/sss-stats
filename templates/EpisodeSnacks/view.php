<?php
/**
 * @var AppView $this
 * @var EpisodeSnack $episodeSnack
 */

use App\Model\Entity\EpisodeSnack;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode Snack'), ['action' => 'edit', $episodeSnack->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode Snack'), ['action' => 'delete', $episodeSnack->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeSnack->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episode Snacks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode Snack'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeSnacks view content">
            <h3><?= h($episodeSnack->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Episode') ?></th>
                    <td><?= $episodeSnack->has('episode') ? $this->Html->link($episodeSnack->episode->id, ['controller' => 'Episodes', 'action' => 'view', $episodeSnack->episode->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Snack') ?></th>
                    <td><?= $episodeSnack->has('snack') ? $this->Html->link($episodeSnack->snack->name, ['controller' => 'Snacks', 'action' => 'view', $episodeSnack->snack->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $episodeSnack->has('user') ? $this->Html->link($episodeSnack->user->name, ['controller' => 'Users', 'action' => 'view', $episodeSnack->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episodeSnack->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($episodeSnack->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($episodeSnack->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
