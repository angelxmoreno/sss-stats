<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FilmsFixture
 */
class FilmsFixture extends TestFixture
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
                'user_id' => 1,
                'submitted_by' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'link' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-09-25 19:49:06',
                'modified' => '2022-09-25 19:49:06',
            ],
        ];
        parent::init();
    }
}
