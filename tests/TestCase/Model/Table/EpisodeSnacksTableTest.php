<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodeSnacksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodeSnacksTable Test Case
 */
class EpisodeSnacksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var EpisodeSnacksTable
     */
    protected $EpisodeSnacks;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EpisodeSnacks',
        'app.Episodes',
        'app.Snacks',
        'app.Users',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeSnacksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeSnacksTable::buildRules()
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
        $config = $this->getTableLocator()->exists('EpisodeSnacks') ? [] : ['className' => EpisodeSnacksTable::class];
        $this->EpisodeSnacks = $this->getTableLocator()->get('EpisodeSnacks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EpisodeSnacks);

        parent::tearDown();
    }
}
