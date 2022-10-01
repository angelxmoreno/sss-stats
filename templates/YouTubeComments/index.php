<?php
/**
* @var AppView $this
 * @var YouTubeComment[]|CollectionInterface $youTubeComments
 */

use App\Model\Entity\YouTubeComment;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/index');
$this->assign('title', 'You Tube Comments')
?>

<table class="table table-striped">
    <thead>
    <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('uid') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('you_tube_comment_author_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('you_tube_video_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('can_reply') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('is_public') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('total_reply_count') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('can_rate') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('like_count') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('published_at') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('text_display') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('text_original') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($youTubeComments as $youTubeComment) : ?>
    <tr>
                                                                                                                                                                                                                                        <td><?= $this->Number->format($youTubeComment->id) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->uid) ?></td>
                                                                                                                                                <td><?= $youTubeComment->has('you_tube_comment_author') ? $this->Html->link($youTubeComment
                            ->you_tube_comment_author->name, ['controller' =>
                            'YouTubeCommentAuthors', 'action' => 'view', $youTubeComment->you_tube_comment_author
                            ->id]) : '' ?>
                        </td>
                                                                                                                                                                                                                                                                                            <td><?= $youTubeComment->has('parent_you_tube_comment') ? $this->Html->link($youTubeComment
                            ->parent_you_tube_comment->id, ['controller' =>
                            'YouTubeComments', 'action' => 'view', $youTubeComment->parent_you_tube_comment
                            ->id]) : '' ?>
                        </td>
                                                                                                                                                                                                                                                                                            <td><?= $youTubeComment->has('you_tube_video') ? $this->Html->link($youTubeComment
                            ->you_tube_video->title, ['controller' =>
                            'YouTubeVideos', 'action' => 'view', $youTubeComment->you_tube_video
                            ->id]) : '' ?>
                        </td>
                                                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->can_reply) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->is_public) ?></td>
                                                                                                                                                                                                                                                                    <td><?= $this->Number->format($youTubeComment->total_reply_count) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->can_rate) ?></td>
                                                                                                                                                                                                                                                                    <td><?= $this->Number->format($youTubeComment->like_count) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->published_at) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->text_display) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->text_original) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->updated_at) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->created) ?></td>
                                                                                                                                                                                                                                                                    <td><?= h($youTubeComment->modified) ?></td>
                                            <td class="actions">
            <?=$this->element('BakeTheme.table_row_actions', ['entity' => $youTubeComment])?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>