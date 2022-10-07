<?php
/**
 * @var AppView $this
 * @var Episode $episode
 */

use App\Model\Dao\HeaderBody;
use App\Model\Entity\Episode;
use App\Utility\Duration;
use App\Utility\NumberAbbreviator;
use App\View\AppView;

$this->extend('BakeTheme.Common/view');
$this->assign('page_controls', '');

$headerBodies = [
    new HeaderBody('Metrics', 'coming soon', 'metricsHeader', 'metricsBody', true),
    new HeaderBody('Snacks', 'coming soon'),
    new HeaderBody('Films', 'coming soon'),
    new HeaderBody('Comments', $this->ReactWidget->widgetAsCode('comments', [
        'videoId' => $episode->you_tube_video->id,
        'user' => $this->Identity->isLoggedIn() ? json_encode($this->Identity->get()) : null,
    ])),
    new HeaderBody('Description', $this->Text->autoParagraph($this->Text->autoLink($episode->you_tube_video->description, ['target' => 'outbound']))),
];

$infoRows = [
    'Date Aired' => $this->Time->nice($episode->you_tube_video->published),
    'Likes' => NumberAbbreviator::shorten($episode->you_tube_video->like_count),
    'Views' => NumberAbbreviator::shorten($episode->you_tube_video->view_count),
    'Duration' => Duration::humanize($episode->you_tube_video->duration),
];
?>
<?php $this->start('titleBlock') ?>
<h1>
    <?= $episode->title ?>
    <small class="fs-3 text-muted">
        episode <?= $episode->name ?>
    </small>
</h1>
<hr/>
<?php $this->end() ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?= $this->YouTube->renderVideo($episode->you_tube_video) ?>
        </div>
        <div class="col">
            <?php foreach ($infoRows as $k => $v): ?>
                <h4><?= $k ?></h4>
                <p class="lead">
                    <?= $v ?>
                </p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<hr/>
<?= $this->element('headerBody/accordion', [
    'containerId' => 'episodeAccordion',
    'rows' => $headerBodies,
]) ?>
<hr/>
<?= $this->element('headerBody/tabs', [
    'containerId' => 'episodeTabs',
    'rows' => $headerBodies,
]) ?>
<hr/>
<div class="episodes view large-9 medium-8 columns content">
    <h4><?= h($episode->title) ?></h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Episode Number') ?></th>
                <td><?= h($episode->episode_number) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($episode->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($episode->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($episode->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Snacks') ?></h4>
        <?php if (!empty($episode->snacks)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Name') ?></th>
                        <th scope="col"><?= __('Brand') ?></th>
                        <th scope="col"><?= __('Type') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($episode->snacks as $snacks): ?>
                        <tr>
                            <td><?= h($snacks->id) ?></td>
                            <td><?= h($snacks->name) ?></td>
                            <td><?= h($snacks->brand) ?></td>
                            <td><?= h($snacks->type) ?></td>
                            <td><?= h($snacks->created) ?></td>
                            <td><?= h($snacks->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Snacks', 'action' =>
                                    'view', $snacks->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Snacks', 'action' =>
                                    'edit', $snacks->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Snacks',
                                    'action' => 'delete', $snacks->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $snacks->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Episode Attribute Values') ?></h4>
        <?php if (!empty($episode->episode_attribute_values)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Episode Id') ?></th>
                        <th scope="col"><?= __('Episode Attribute Id') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Value') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($episode->episode_attribute_values as $episodeAttributeValues): ?>
                        <tr>
                            <td><?= h($episodeAttributeValues->id) ?></td>
                            <td><?= h($episodeAttributeValues->episode_id) ?></td>
                            <td><?= h($episodeAttributeValues->episode_attribute_id) ?></td>
                            <td><?= h($episodeAttributeValues->user_id) ?></td>
                            <td><?= h($episodeAttributeValues->value) ?></td>
                            <td><?= h($episodeAttributeValues->created) ?></td>
                            <td><?= h($episodeAttributeValues->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EpisodeAttributeValues', 'action' =>
                                    'view', $episodeAttributeValues->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EpisodeAttributeValues', 'action' =>
                                    'edit', $episodeAttributeValues->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EpisodeAttributeValues',
                                    'action' => 'delete', $episodeAttributeValues->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $episodeAttributeValues->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Films') ?></h4>
        <?php if (!empty($episode->films)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Episode Id') ?></th>
                        <th scope="col"><?= __('User Id') ?></th>
                        <th scope="col"><?= __('Submitted By') ?></th>
                        <th scope="col"><?= __('Title') ?></th>
                        <th scope="col"><?= __('Link') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($episode->films as $films): ?>
                        <tr>
                            <td><?= h($films->id) ?></td>
                            <td><?= h($films->episode_id) ?></td>
                            <td><?= h($films->user_id) ?></td>
                            <td><?= h($films->submitted_by) ?></td>
                            <td><?= h($films->title) ?></td>
                            <td><?= h($films->link) ?></td>
                            <td><?= h($films->created) ?></td>
                            <td><?= h($films->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Films', 'action' =>
                                    'view', $films->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Films', 'action' =>
                                    'edit', $films->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Films',
                                    'action' => 'delete', $films->id], ['confirm' => __('Are you sure you want to delete
                            # {0}?', $films->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
