<?php
/**
 * @var AppView $this
 */

use App\View\AppView;
use Cake\Core\Configure;

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <?= Configure::read('App.title') ?>
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <?= $this->NavBar->linkItem('Episodes', ['controller' => 'Episodes']) ?>
                <?= $this->NavBar->linkItem('Films', ['controller' => 'Films']) ?>
                <?= $this->NavBar->linkItem('About', ['controller' => 'Pages', 'action' => 'display', 'about']) ?>
                <?= $this->NavBar->linkItem('Contact', ['controller' => 'Pages', 'action' => 'display', 'contact']) ?>
            </ul>
            <ul class="navbar-nav ms-auto"></ul>
            <?php if ($this->Identity->isLoggedIn()): ?>
                <?= $this->cell('DirectMessages.Messages')->render() ?>.
                <span class="navbar-text mx-3">Logged in as <?= $this->Identity->get('name') ?></span>
                <?= $this->Html->linkFromPath('Log Out', 'Auth::logout', [], ['class' => 'btn btn-sm btn-outline-success']) ?>
            <?php else: ?>
                <?= $this->Html->linkFromPath('Log In', 'Auth::login', [], ['class' => 'btn btn-sm btn-success me-1']) ?>
                <?= $this->Html->linkFromPath('Register', 'Auth::register', [], ['class' => 'btn btn-sm btn-outline-success']) ?>
            <?php endif; ?>
        </div>
    </div>
</nav>
