<?php
/**
 * @var AppView $this
 * @var Episode[]|CollectionInterface $episodes
 */

use App\Model\Entity\Episode;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('page_controls', '');

$sortParams = [
    ['title' => 'Episode', 'field' => 'Episodes.episode_number'],
    ['title' => 'Likes', 'field' => 'YouTubeVideos.like_count'],
    ['title' => 'Views', 'field' => 'YouTubeVideos.view_count'],
    ['title' => 'Comments', 'field' => 'YouTubeVideos.comment_count'],
    ['title' => 'Created', 'field' => 'Episodes.created'],
    ['title' => 'Modified', 'field' => 'Episodes.modified'],
];

$sortClass = 'btn btn-outline-primary';
$sortActiveClass = $sortClass . ' active';
?>

<?php $this->start('titleBlock') ?>
<h1>Spooky Scary Sunday Episodes</h1>
<div id="episode_sort_control" class="btn-group" role="group" aria-label="Basic radio toggle button group">
    <button type="button" class="btn btn-outline-dark disabled">Sort By</button>

    <?php foreach ($sortParams as $sortParam): ?>
        <?= $this->Html->link(
            $sortParam['title'],
            $this->Paginator->generateUrl(['page' => 1, 'sort' => $sortParam['field']]),
            [
                'class' => $this->Paginator->sortKey() === $sortParam['field'] ? $sortActiveClass : $sortClass,
                'escape' => false,
            ]
        ) ?>
    <?php endforeach; ?>
</div>
<hr/>
<?php $this->end() ?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2 pb-2">
    <?php foreach ($episodes as $episode): ?>
        <div class="col">
            <?= $this->element('video_col_thumbnail', compact('episode')) ?>
        </div>
    <?php endforeach; ?>
</div>
