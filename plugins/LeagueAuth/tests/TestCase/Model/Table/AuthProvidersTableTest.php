<?php
declare(strict_types=1);

namespace LeagueAuth\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use LeagueAuth\Model\Table\AuthProvidersTable;

/**
 * LeagueAuth\Model\Table\AuthProvidersTable Test Case
 */
class AuthProvidersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var AuthProvidersTable
     */
    protected $AuthProviders;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.LeagueAuth.AuthProviders',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \LeagueAuth\Model\Table\AuthProvidersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \LeagueAuth\Model\Table\AuthProvidersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test saveLeagueAuthUser method
     *
     * @return void
     * @uses \LeagueAuth\Model\Table\AuthProvidersTable::saveLeagueAuthUser()
     */
    public function testSaveLeagueAuthUser(): void
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
        $config = $this->getTableLocator()->exists('AuthProviders') ? [] : ['className' => AuthProvidersTable::class];
        $this->AuthProviders = $this->getTableLocator()->get('AuthProviders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AuthProviders);

        parent::tearDown();
    }
}
