<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YouTubeCommentAuthorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YouTubeCommentAuthorsTable Test Case
 */
class YouTubeCommentAuthorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var YouTubeCommentAuthorsTable
     */
    protected $YouTubeCommentAuthors;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.YouTubeCommentAuthors',
        'app.YouTubeComments',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\YouTubeCommentAuthorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\YouTubeCommentAuthorsTable::buildRules()
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
        $config = $this->getTableLocator()->exists('YouTubeCommentAuthors') ? [] : ['className' => YouTubeCommentAuthorsTable::class];
        $this->YouTubeCommentAuthors = $this->getTableLocator()->get('YouTubeCommentAuthors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->YouTubeCommentAuthors);

        parent::tearDown();
    }
}
