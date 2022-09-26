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
                <span class="navbar-text me-3">Logged in as <?= $this->Identity->get('name') ?></span>
                <?= $this->Html->link('Log Out', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'btn btn-sm btn-outline-success']) ?>
            <?php else: ?>
                <?= $this->Html->link('Log In', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'btn btn-sm btn-success me-1']) ?>
                <?= $this->Html->link('Register', ['controller' => 'Auth', 'action' => 'register'], ['class' => 'btn btn-sm btn-outline-success']) ?>
            <?php endif; ?>
        </div>
    </div>
</nav>
