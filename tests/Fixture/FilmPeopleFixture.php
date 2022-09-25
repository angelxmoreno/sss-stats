<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FilmPeopleFixture
 */
class FilmPeopleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'film_people';

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
                'person_id' => 1,
                'film_id' => 1,
                'user_id' => 1,
                'type' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-09-25 01:28:16',
                'modified' => '2022-09-25 01:28:16',
            ],
        ];
        parent::init();
    }
}
