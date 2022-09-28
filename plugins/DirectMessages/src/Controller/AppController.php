<?php
declare(strict_types=1);

namespace DirectMessages\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated([]);
    }
}
