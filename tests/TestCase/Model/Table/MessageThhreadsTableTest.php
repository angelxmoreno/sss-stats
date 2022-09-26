<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageThhreadsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageThhreadsTable Test Case
 */
class MessageThhreadsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var MessageThhreadsTable
     */
    protected $MessageThhreads;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MessageThhreads',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MessageThhreadsTable::validationDefault()
     */
    public function testValidationDefault(): void
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
        $config = $this->getTableLocator()->exists('MessageThhreads') ? [] : ['className' => MessageThhreadsTable::class];
        $this->MessageThhreads = $this->getTableLocator()->get('MessageThhreads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MessageThhreads);

        parent::tearDown();
    }
}
