<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\IdentityComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\IdentityComponent Test Case
 */
class IdentityComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var IdentityComponent
     */
    protected $Identity;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Identity = new IdentityComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Identity);

        parent::tearDown();
    }
}
