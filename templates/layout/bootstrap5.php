<?php
/**
 * @var AppView $this
 */

use App\View\AppView;
use Cake\Core\Configure;

$cssFiles = Configure::read('debug')
    ? ['BootstrapUI.bootstrap']
    : ['BootstrapUI.bootstrap.min'];

$cssFiles = array_merge($cssFiles, [
    'BootstrapUI./font/bootstrap-icons',
    'BootstrapUI./font/bootstrap-icon-sizes',
]);

$this->Html->css($cssFiles, ['block' => 'css']);


$scriptFiles = Configure::read('debug')
    ? ['BootstrapUI.popper', 'BootstrapUI.bootstrap']
    : ['BootstrapUI.popper.min', 'BootstrapUI.bootstrap.min'];

$scriptFiles = array_merge($scriptFiles, []);

$this->Html->script($scriptFiles, ['block' => 'script']);

?>
<!doctype html>
<?= $this->Html->tag('html', null, [
    'lang' => Configure::read('App.defaultLanguage', 'en'),
]) ?>
<head>
    <?= $this->fetch('post.head') ?>
    <?= $this->Html->charset(Configure::read('App.encoding', 'UTF-8')) ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <title>
        <?= $this->fetch('meta.title') ?>
    </title>
    <meta name="description" content="<?= $this->fetch('meta.description') ?>"/>
    <?php if ($this->exists('meta.canonical')): ?>
        <link rel="canonical" href="<?= $this->fetch('meta.canonical') ?>"/>
    <?php endif; ?>
    <?= $this->fetch('css') ?>
</head>
<body>
<?= $this->fetch('post.body') ?>
<?= $this->element('layout/navbar') ?>

<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>

<footer class="py-5 bg-dark">
    <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>
<?= $this->fetch('script') ?>
</body>
