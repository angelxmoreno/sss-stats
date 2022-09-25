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
                'title' => 1,
                'link' => 1,
                'created' => '2022-09-25 01:28:16',
                'modified' => '2022-09-25 01:28:16',
            ],
        ];
        parent::init();
    }
}
