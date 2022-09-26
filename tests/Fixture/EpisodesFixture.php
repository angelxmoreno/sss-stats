<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EpisodesFixture
 */
class EpisodesFixture extends TestFixture
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
                'episode_number' => '',
                'created' => '2022-09-25 19:49:05',
                'modified' => '2022-09-25 19:49:05',
            ],
        ];
        parent::init();
    }
}
