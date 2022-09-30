<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Cell;

use App\View\Cell\VideoPreviewCell;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * App\View\Cell\VideoPreviewCell Test Case
 */
class VideoPreviewCellTest extends TestCase
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
     * @var VideoPreviewCell
     */
    protected $VideoPreview;

    /**
     * Test display method
     *
     * @return void
     * @uses \App\View\Cell\VideoPreviewCell::display()
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
        $this->VideoPreview = new VideoPreviewCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VideoPreview);

        parent::tearDown();
    }
}
