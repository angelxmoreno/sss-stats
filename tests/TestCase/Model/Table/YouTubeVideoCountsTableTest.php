<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YouTubeVideoCountsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YouTubeVideoCountsTable Test Case
 */
class YouTubeVideoCountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var YouTubeVideoCountsTable
     */
    protected $YouTubeVideoCounts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.YouTubeVideoCounts',
        'app.YouTubeVideos',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\YouTubeVideoCountsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\YouTubeVideoCountsTable::buildRules()
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
        $config = $this->getTableLocator()->exists('YouTubeVideoCounts') ? [] : ['className' => YouTubeVideoCountsTable::class];
        $this->YouTubeVideoCounts = $this->getTableLocator()->get('YouTubeVideoCounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->YouTubeVideoCounts);

        parent::tearDown();
    }
}
