<?php
/**
 * @var AppView $this
 * @var Episode $episode
 */

use App\Model\Entity\Episode;
use App\View\AppView;

$video = $episode->you_tube_video;
?>
<div class="row gx-4 gx-lg-5 align-items-center my-2">
    <div class="col-lg-7">
        <?= $this->Html->image($video->thumbnails->maxres->url, [
            'class' => 'img-fluid rounded mb-4 mb-lg-0',
            'alt' => $video->title,
        ]) ?>
    </div>
    <div class="col-lg-5">
        <h2 class="fw-light">
            <?= $episode->title ?>
        </h2>
        <p class="lead text-muted">
            <?= $this->Text->autoParagraph($this->Text->truncate($video->description, 425)) ?>
        </p>
        <?= $this->Html->linkFromPath('View Stats', 'Episodes::view', [$episode->id], [
            'class' => 'btn btn-primary btn-lg',
        ]) ?>
    </div>
</div>
