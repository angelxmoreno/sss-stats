<?php
/**
 * @var AppView $this
 * @var Snack $snack
 */

use App\Model\Entity\Snack;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Snack'), ['action' => 'edit', $snack->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Snack'), ['action' => 'delete', $snack->id], ['confirm' => __('Are you sure you want to delete # {0}?', $snack->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Snacks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Snack'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="snacks view content">
            <h3><?= h($snack->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($snack->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand') ?></th>
                    <td><?= h($snack->brand) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($snack->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($snack->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($snack->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($snack->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Episodes') ?></h4>
                <?php if (!empty($snack->episodes)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Episode Number') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($snack->episodes as $episodes) : ?>
                                <tr>
                                    <td><?= h($episodes->id) ?></td>
                                    <td><?= h($episodes->episode_number) ?></td>
                                    <td><?= h($episodes->created) ?></td>
                                    <td><?= h($episodes->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Episodes', 'action' => 'view', $episodes->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Episodes', 'action' => 'edit', $episodes->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Episodes', 'action' => 'delete', $episodes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodes->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
