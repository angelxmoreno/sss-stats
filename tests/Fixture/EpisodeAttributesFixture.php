<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EpisodeAttributesFixture
 */
class EpisodeAttributesFixture extends TestFixture
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
                'type' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-09-25 01:28:15',
                'modified' => '2022-09-25 01:28:15',
            ],
        ];
        parent::init();
    }
}
