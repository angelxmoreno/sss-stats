<?php
declare(strict_types=1);

namespace DirectMessages\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use DirectMessages\Controller\MessageThreadsController;

/**
 * DirectMessages\Controller\MessageThreadsController Test Case
 *
 * @uses \DirectMessages\Controller\MessageThreadsController
 */
class MessageThreadsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.DirectMessages.MessageThreads',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \DirectMessages\Controller\MessageThreadsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \DirectMessages\Controller\MessageThreadsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \DirectMessages\Controller\MessageThreadsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \DirectMessages\Controller\MessageThreadsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \DirectMessages\Controller\MessageThreadsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
