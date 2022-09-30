<?php
/**
 * @var AppView $this
 * @var Episode $episode
 */

use App\Model\Entity\Episode;
use App\Utility\NumberAbbreviator;
use App\View\AppView;

?>
<div class="card border-danger">
    <div class="card-header d-flex flex-row justify-content-between">
        <strong>Episode <?= $episode->name ?></strong>
        <small class="text-muted">
            <?= $this->Time->timeAgoInWords($episode->you_tube_video->published, [
                'accuracy' => [
                    'day' => 'day',
                    'week' => 'week',
                ],
            ]) ?>
        </small>
    </div>
    <div class="position-relative">
        <?= $this->Html->image($episode->you_tube_video->thumbnails->maxres->url, [
            'class' => 'img-fluid card-img-top',
            'alt' => $episode->you_tube_video->title,
        ]) ?>
        <?= $this->Html->image('play-button.png', [
            'class' => 'img-fluid position-absolute top-50 start-50 translate-middle',
            'width' => '15%',
        ]) ?>
    </div>
    <div class="card-body">
        <h5 class="card-title text-truncate">
            <?= $episode->title ?>
        </h5>
        <div class="d-flex flex-row justify-content-between">
            <strong>
                <?= $this->Html->icon('eye') ?>
                <?= NumberAbbreviator::shorten($episode->you_tube_video->view_count) ?>
            </strong>
            <strong>
                <?= $this->Html->icon('hand-thumbs-up') ?>
                <?= NumberAbbreviator::shorten($episode->you_tube_video->like_count) ?>
            </strong>
            <strong>
                <?= $this->Html->icon('clock') ?>
                <?= (new DateInterval($episode->you_tube_video->duration))->format('%i minutes') ?>
            </strong>
        </div>

    </div>
    <?= $this->Html->linkFromPath('', 'Episodes::view', [$episode->id], [
        'class' => 'stretched-link',
    ]) ?>
</div>
