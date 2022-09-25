<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SnacksFixture
 */
class SnacksFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'brand' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-09-25 01:28:16',
                'modified' => '2022-09-25 01:28:16',
            ],
        ];
        parent::init();
    }
}
