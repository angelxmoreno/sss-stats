<?php
declare(strict_types=1);

namespace DirectMessages\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use DirectMessages\Model\Table\MessageThreadsTable;

/**
 * DirectMessages\Model\Table\MessageThreadsTable Test Case
 */
class MessageThreadsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var MessageThreadsTable
     */
    protected $MessageThreads;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.DirectMessages.MessageThreads',
        'plugin.DirectMessages.User1s',
        'plugin.DirectMessages.User2s',
        'plugin.DirectMessages.Messages',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \DirectMessages\Model\Table\MessageThreadsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \DirectMessages\Model\Table\MessageThreadsTable::buildRules()
     */
    public function testBuildRules(): void
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
        $config = $this->getTableLocator()->exists('MessageThreads') ? [] : ['className' => MessageThreadsTable::class];
        $this->MessageThreads = $this->getTableLocator()->get('MessageThreads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MessageThreads);

        parent::tearDown();
    }
}
