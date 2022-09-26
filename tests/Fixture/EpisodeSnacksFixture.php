<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EpisodeSnacksFixture
 */
class EpisodeSnacksFixture extends TestFixture
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
                'episode_id' => 1,
                'snack_id' => 1,
                'user_id' => 1,
                'created' => '2022-09-25 19:49:05',
                'modified' => '2022-09-25 19:49:05',
            ],
        ];
        parent::init();
    }
}
