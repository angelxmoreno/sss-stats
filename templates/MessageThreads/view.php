<?php
/**
 * @var AppView $this
 * @var MessageThread $messageThread
 * @var Message $message
 */

use App\View\AppView;
use DirectMessages\Model\Entity\Message;
use DirectMessages\Model\Entity\MessageThread;

$this->extend('BakeTheme.Common/view');
$users = [
    $messageThread->user->id => $messageThread->user,
    $this->Identity->getId() => $this->Identity->get(),
];
?>
<?php $this->start('titleBlock') ?>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <?php if ($messageThread->user->picture_url): ?>
                <div class="col-md-4">
                    <?= $this->Html->image($messageThread->user->picture_url, [
                        'class' => 'img-fluid rounded-start',
                    ]) ?>
                </div>
            <?php endif; ?>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title">
                        <?= $messageThread->user->name ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
<?php $this->end() ?>

    <div class="container-fluid">
        <?php foreach ($messageThread->messages as $messageRow): ?>
            <?= $this->element('message_row', [
                'users' => $users,
                'message' => $messageRow,
            ]) ?>
        <?php endforeach; ?>
    </div>

<?php
echo $this->Form->create($message);
echo $this->Form->control('message');
echo $this->Form->button('Send', ['class' => 'btn btn-lg btn-outline-success']);
echo $this->Form->end();
