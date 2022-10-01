<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YouTubeCommentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YouTubeCommentsTable Test Case
 */
class YouTubeCommentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var YouTubeCommentsTable
     */
    protected $YouTubeComments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.YouTubeComments',
        'app.YouTubeVideos',
        'app.YouTubeCommentAuthors',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\YouTubeCommentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\YouTubeCommentsTable::buildRules()
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
        $config = $this->getTableLocator()->exists('YouTubeComments') ? [] : ['className' => YouTubeCommentsTable::class];
        $this->YouTubeComments = $this->getTableLocator()->get('YouTubeComments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->YouTubeComments);

        parent::tearDown();
    }
}
