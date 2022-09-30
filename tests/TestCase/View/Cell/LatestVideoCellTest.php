<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Cell;

use App\View\Cell\LatestVideoCell;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * App\View\Cell\LatestVideoCell Test Case
 */
class LatestVideoCellTest extends TestCase
{
    /**
     * Request mock
     *
     * @var ServerRequest|MockObject
     */
    protected $request;

    /**
     * Response mock
     *
     * @var Response|MockObject
     */
    protected $response;

    /**
     * Test subject
     *
     * @var LatestVideoCell
     */
    protected $LatestVideo;

    /**
     * Test display method
     *
     * @return void
     * @uses \App\View\Cell\LatestVideoCell::display()
     */
    public function testDisplay(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->request = $this->getMockBuilder('Cake\Http\ServerRequest')->getMock();
        $this->response = $this->getMockBuilder('Cake\Http\Response')->getMock();
        $this->LatestVideo = new LatestVideoCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LatestVideo);

        parent::tearDown();
    }
}
