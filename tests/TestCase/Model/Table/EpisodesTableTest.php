<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodesTable Test Case
 */
class EpisodesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var EpisodesTable
     */
    protected $Episodes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Episodes',
        'app.YouTubeVideos',
        'app.EpisodeAttributeValues',
        'app.EpisodeSnacks',
        'app.Snacks',
        'app.Films',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EpisodesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EpisodesTable::buildRules()
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
        $config = $this->getTableLocator()->exists('Episodes') ? [] : ['className' => EpisodesTable::class];
        $this->Episodes = $this->getTableLocator()->get('Episodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Episodes);

        parent::tearDown();
    }
}
