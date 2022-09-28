<?php
/**
 * @var AppView $this
 * @var Message $message
 * @var User[] $users
 */

use App\Model\Entity\User;
use App\View\AppView;
use DirectMessages\Model\Entity\Message;

$user = $users[$message->user_id];
?>

<div class="card mb-3">
    <div class="row g-0">
        <?php if ($user->picture_url): ?>
            <div class="col-md-4">
                <?= $this->Html->image($user->picture_url, [
                    'class' => 'img-fluid rounded-start',
                ]) ?>
            </div>
        <?php endif; ?>
        <div class="col-md-8">
            <div class="card-body">
                <h1 class="card-title">
                    <?= $user->name ?>
                </h1>
                <p class="card-text">
                    <?= $message->message ?>
                </p>
                <p class="card-text">
                    <small class="text-muted">
                        <?= $this->Time->timeAgoInWords($message->created) ?>
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>
