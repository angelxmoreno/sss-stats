<?php
/**
 * @var AppView $this
 * @var User $user
 * @var GoogleAuthProvider[]|CollectionInterface $googleAuthProviders
 * @var EpisodeAttributeValue[]|CollectionInterface $episodeAttributeValues
 * @var EpisodeSnack[]|CollectionInterface $episodeSnacks
 * @var FilmPerson[]|CollectionInterface $filmPeople
 * @var Film[]|CollectionInterface $films
 * @var Person[]|CollectionInterface $people
 */

use App\Model\Entity\EpisodeAttributeValue;
use App\Model\Entity\EpisodeSnack;
use App\Model\Entity\Film;
use App\Model\Entity\FilmPerson;
use App\Model\Entity\GoogleAuthProvider;
use App\Model\Entity\Person;
use App\Model\Entity\User;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$this->extend('BakeTheme.Common/add');
$this->assign('title', 'Add a User');
?>

<div class="users form content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
        echo $this->Form->control('google_auth_provider_id', ['options' => $googleAuthProviders, 'empty' => true]);
        echo $this->Form->control('name');
        echo $this->Form->control('email');
        echo $this->Form->control('password');
        echo $this->Form->control('picture_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add'), [
        'class' => 'btn btn-outline-success btn-lg',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
