<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\View;

use Authentication\View\Helper\IdentityHelper;
use BootstrapUI\View\Helper\BreadcrumbsHelper;
use BootstrapUI\View\Helper\FlashHelper;
use BootstrapUI\View\Helper\FormHelper;
use BootstrapUI\View\Helper\HtmlHelper;
use BootstrapUI\View\Helper\PaginatorHelper;
use BootstrapUI\View\UIViewTrait;
use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 *
 * @property HtmlHelper $Html
 * @property FormHelper $Form
 * @property FlashHelper $Flash
 * @property PaginatorHelper $Paginator
 * @property BreadcrumbsHelper $Breadcrumbs
 * @property IdentityHelper $Identity
 */
class AppView extends View
{
    use UIViewTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->initializeUI([
            'layout' => 'bootstrap5',
        ]);

        $this->loadHelper('Authentication.Identity');
    }
}
