<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmsTable Test Case
 */
class FilmsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var FilmsTable
     */
    protected $Films;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Films',
        'app.Episodes',
        'app.Users',
        'app.FilmPeople',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FilmsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FilmsTable::buildRules()
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
        $config = $this->getTableLocator()->exists('Films') ? [] : ['className' => FilmsTable::class];
        $this->Films = $this->getTableLocator()->get('Films', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Films);

        parent::tearDown();
    }
}
