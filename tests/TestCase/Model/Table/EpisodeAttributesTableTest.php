<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodeAttributesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodeAttributesTable Test Case
 */
class EpisodeAttributesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var EpisodeAttributesTable
     */
    protected $EpisodeAttributes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EpisodeAttributes',
        'app.EpisodeAttributeValues',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeAttributesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeAttributesTable::buildRules()
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
        $config = $this->getTableLocator()->exists('EpisodeAttributes') ? [] : ['className' => EpisodeAttributesTable::class];
        $this->EpisodeAttributes = $this->getTableLocator()->get('EpisodeAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EpisodeAttributes);

        parent::tearDown();
    }
}
