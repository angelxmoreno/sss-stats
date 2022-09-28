<?php
declare(strict_types=1);

namespace DirectMessages\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MessageThreadsFixture
 */
class MessageThreadsFixture extends TestFixture
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
                'message_count' => 1,
                'created' => '2022-09-27 17:58:26',
                'modified' => '2022-09-27 17:58:26',
            ],
        ];
        parent::init();
    }
}
