<?php
declare(strict_types=1);

namespace DirectMessages\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use DirectMessages\Model\Table\MessagesTable;

/**
 * DirectMessages\Model\Table\MessagesTable Test Case
 */
class MessagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var MessagesTable
     */
    protected $Messages;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.DirectMessages.Messages',
        'plugin.DirectMessages.MessageThreads',
        'plugin.DirectMessages.Users',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \DirectMessages\Model\Table\MessagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \DirectMessages\Model\Table\MessagesTable::buildRules()
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
        $config = $this->getTableLocator()->exists('Messages') ? [] : ['className' => MessagesTable::class];
        $this->Messages = $this->getTableLocator()->get('Messages', $config);
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
