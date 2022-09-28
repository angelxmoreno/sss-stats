<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YouTubeVideosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YouTubeVideosTable Test Case
 */
class YouTubeVideosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var YouTubeVideosTable
     */
    protected $YouTubeVideos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.YouTubeVideos',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\YouTubeVideosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\YouTubeVideosTable::buildRules()
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
        $config = $this->getTableLocator()->exists('YouTubeVideos') ? [] : ['className' => YouTubeVideosTable::class];
        $this->YouTubeVideos = $this->getTableLocator()->get('YouTubeVideos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->YouTubeVideos);

        parent::tearDown();
    }
}
