<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\Site;
use App\View\AppView;
use Cake\Core\Configure;
use Manage\Model\Table\OrdersTable;

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <?= Configure::read('App.title')?>
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
<!--        <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--            --><?//= $this->cell('NavbarCategories', [], ['cache' => !Configure::read('debug')]) ?>
<!--            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">-->
<!--                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>-->
<!--                -->
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"-->
<!--                       aria-expanded="false">-->
<!--                        Account-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        --><?// if ($this->Identity->isLoggedIn()): ?>
<!--                            --><?//= $this->NavBar->dropDownItem('Profile', ['controller' => 'Users', 'action' => 'view']) ?>
<!--                            --><?//= $this->NavBar->dropDownItem('Orders', ['controller' => 'Orders']) ?>
<!--                            --><?//= $this->NavBar->dropDownItem('Log Out', ['controller' => 'Auth', 'action' => 'logout']) ?>
<!--                        --><?// endif; ?>
<!--                        --><?// if (!$this->Identity->isLoggedIn()): ?>
<!--                            --><?//= $this->NavBar->dropDownItem('Log In', ['controller' => 'Auth', 'action' => 'login']) ?>
<!--                        --><?// endif; ?>
<!--                    </ul>-->
<!--                </li>-->
<!--                --><?// if ($this->Identity->isLoggedIn() && $this->Identity->get('is_manager')): ?>
<!--                    <li class="nav-item dropdown">-->
<!--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"-->
<!--                           aria-expanded="false">-->
<!--                            Manage-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li><h6 class="dropdown-header">Orders</h6></li>-->
<!--                            --><?// foreach (array_keys(OrdersTable::FILTERS) as $filterName): ?>
<!--                                --><?//= $this->NavBar->dropDownItem(ucfirst($filterName) . ' Orders', [
//                                    'prefix' => false,
//                                    'plugin' => 'Manage',
//                                    'controller' => 'Orders',
//                                    'action' => 'index',
//                                    $filterName,
//                                ]) ?>
<!--                            --><?// endforeach; ?>
<!--                            --><?// foreach ([
//                                            'Sites',
//                                            'Categories',
//                                            'Products',
//                                            'Users',
//                                        ] as $controller): ?>
<!--                                <li>-->
<!--                                    <hr class="dropdown-divider">-->
<!--                                </li>-->
<!--                                <li><h6 class="dropdown-header">--><?//= $controller ?><!--</h6></li>-->
<!--                                --><?//= $this->NavBar->dropDownItem('List ' . $controller, ['plugin' => 'Manage', 'controller' => $controller, 'action' => 'index']) ?>
<!--                                --><?//= $this->NavBar->dropDownItem('Create ' . $controller, ['plugin' => 'Manage', 'controller' => $controller, 'action' => 'add']) ?>
<!--                            --><?// endforeach; ?>
<!---->
<!--                            <li><h6 class="dropdown-header">Amazon Data</h6></li>-->
<!--                            --><?//= $this->NavBar->dropDownItem('Categories', [
//                                'prefix' => false,
//                                'plugin' => 'Manage',
//                                'controller' => 'AmazonCategories',
//                                'action' => 'index',
//                            ]) ?>
<!---->
<!--                        </ul>-->
<!--                    </li>-->
<!--                --><?// endif; ?>
<!--            </ul>-->
<!--            <span class="navbar-text">-->
<!--                --><?//= $this->Cart->showCart() ?>
<!--            </span>-->
<!--            -->
<!--        </div>-->
    </div>
</nav>
