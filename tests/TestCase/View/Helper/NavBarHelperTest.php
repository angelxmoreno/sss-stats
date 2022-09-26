<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\NavBarHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\NavBarHelper Test Case
 */
class NavBarHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var NavBarHelper
     */
    protected $NavBar;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->NavBar = new NavBarHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->NavBar);

        parent::tearDown();
    }
}
