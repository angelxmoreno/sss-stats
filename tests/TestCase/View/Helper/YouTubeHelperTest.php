<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\YouTubeHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\YouTubeHelper Test Case
 */
class YouTubeHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var YouTubeHelper
     */
    protected $YouTube;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->YouTube = new YouTubeHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->YouTube);

        parent::tearDown();
    }
}
