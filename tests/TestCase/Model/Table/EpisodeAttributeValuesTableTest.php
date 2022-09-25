<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodeAttributeValuesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodeAttributeValuesTable Test Case
 */
class EpisodeAttributeValuesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var EpisodeAttributeValuesTable
     */
    protected $EpisodeAttributeValues;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EpisodeAttributeValues',
        'app.Episodes',
        'app.EpisodeAttributes',
        'app.Users',
    ];

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeAttributeValuesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeAttributeValuesTable::buildRules()
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
        $config = $this->getTableLocator()->exists('EpisodeAttributeValues') ? [] : ['className' => EpisodeAttributeValuesTable::class];
        $this->EpisodeAttributeValues = $this->getTableLocator()->get('EpisodeAttributeValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EpisodeAttributeValues);

        parent::tearDown();
    }
}
