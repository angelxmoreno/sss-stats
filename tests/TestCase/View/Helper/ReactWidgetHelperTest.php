<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\ReactWidgetHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\ReactWidgetHelper Test Case
 */
class ReactWidgetHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var ReactWidgetHelper
     */
    protected $ReactWidget;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->ReactWidget = new ReactWidgetHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ReactWidget);

        parent::tearDown();
    }
}
