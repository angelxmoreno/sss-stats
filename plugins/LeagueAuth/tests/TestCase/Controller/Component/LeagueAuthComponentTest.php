<?php
declare(strict_types=1);

namespace LeagueAuth\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use LeagueAuth\Controller\Component\LeagueAuthComponent;

/**
 * LeagueAuth\Controller\Component\LeagueAuthComponent Test Case
 */
class LeagueAuthComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var LeagueAuthComponent
     */
    protected $LeagueAuth;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->LeagueAuth = new LeagueAuthComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LeagueAuth);

        parent::tearDown();
    }
}
