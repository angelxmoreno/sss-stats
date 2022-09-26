<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MessageThhreadsFixture
 */
class MessageThhreadsFixture extends TestFixture
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
                'user_1_id' => 1,
                'user_2_id' => 1,
                'created' => '2022-09-25 00:46:42',
                'modified' => '2022-09-25 00:46:42',
            ],
        ];
        parent::init();
    }
}
