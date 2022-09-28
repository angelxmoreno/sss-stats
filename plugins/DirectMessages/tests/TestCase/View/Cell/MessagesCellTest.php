<?php
declare(strict_types=1);

namespace DirectMessages\Test\TestCase\View\Cell;

use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use DirectMessages\View\Cell\MessagesCell;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * DirectMessages\View\Cell\MessagesCell Test Case
 */
class MessagesCellTest extends TestCase
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
     * @var MessagesCell
     */
    protected $Messages;

    /**
     * Test display method
     *
     * @return void
     * @uses \DirectMessages\View\Cell\MessagesCell::display()
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
        $this->Messages = new MessagesCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Messages);

        parent::tearDown();
    }
}
