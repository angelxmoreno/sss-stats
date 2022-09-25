<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmPeopleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmPeopleTable Test Case
 */
class FilmPeopleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var FilmPeopleTable
     */
    protected $FilmPeople;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.FilmPeople',
        'app.People',
        'app.Films',
        'app.Users',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FilmPeopleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FilmPeopleTable::buildRules()
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
        $config = $this->getTableLocator()->exists('FilmPeople') ? [] : ['className' => FilmPeopleTable::class];
        $this->FilmPeople = $this->getTableLocator()->get('FilmPeople', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FilmPeople);

        parent::tearDown();
    }
}
