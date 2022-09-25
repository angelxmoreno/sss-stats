<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\EpisodeSnacksController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\EpisodeSnacksController Test Case
 *
 * @uses \App\Controller\EpisodeSnacksController
 */
class EpisodeSnacksControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\EpisodeSnacksController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\EpisodeSnacksController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\EpisodeSnacksController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\EpisodeSnacksController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\EpisodeSnacksController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
