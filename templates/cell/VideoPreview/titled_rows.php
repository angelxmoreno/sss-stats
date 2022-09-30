<?php
/**
 * @var AppView $this
 * @var Episode[]|CollectionInterface $episodes
 * @var string $title
 * @var ?string $seeMoreUri
 */

use App\Model\Entity\Episode;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>

<div class="">
    <h2>
        <?= $title ?>
        <?php if (isset($seeMoreUri)): ?>
            <small class="">
                <?= $this->Html->link('See More', $seeMoreUri, [
                    'class' => 'fs-6 text-muted',
                ]) ?>
            </small>
        <?php endif; ?>
    </h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-2">
        <?php foreach ($episodes as $episode): ?>
            <div class="col">
                <?= $this->element('video_col_thumbnail', compact('episode')) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

