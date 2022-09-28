<?php
declare(strict_types=1);

namespace DirectMessages\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MessagesFixture
 */
class MessagesFixture extends TestFixture
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
                'message_thread_id' => 1,
                'user_id' => 1,
                'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'read' => '2022-09-27 17:58:32',
                'created' => '2022-09-27 17:58:32',
                'modified' => '2022-09-27 17:58:32',
                'deleted' => '2022-09-27 17:58:32',
            ],
        ];
        parent::init();
    }
}
