<?php
declare(strict_types=1);

namespace App\Test\TestCase\Command;

use App\Command\VideoImportCommand;
use Cake\TestSuite\ConsoleIntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Command\VideoImportCommand Test Case
 *
 * @uses \App\Command\VideoImportCommand
 */
class VideoImportCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;

    /**
     * Test buildOptionParser method
     *
     * @return void
     * @uses \App\Command\VideoImportCommand::buildOptionParser()
     */
    public function testBuildOptionParser(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test execute method
     *
     * @return void
     * @uses \App\Command\VideoImportCommand::execute()
     */
    public function testExecute(): void
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
        $this->useCommandRunner();
    }
}
