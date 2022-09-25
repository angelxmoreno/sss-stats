<?php
declare(strict_types=1);

use App\Utility\FakerBuilder;
use Migrations\AbstractSeed;

/**
 * AlphaSeeder seed.
 */
class AlphaSeederSeed extends AbstractSeed
{

    protected const NUM_USERS = 20;
    protected const NUM_SNACKS = 60;
    protected const NUM_PEOPLE = 60;
    protected const NUM_FILMS = 120;
    protected const NUM_FILM_PEOPLE = 240;

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data['users'] = $this->buildUsers();
        $data['episodes'] = $this->buildEpisodes();
        $data['episode_attributes'] = $this->buildEpisodeAttributes();
        $data['episode_attribute_values'] = $this->buildEpisodeAttributeValues($data);
        $data['snacks'] = $this->buildSnacks();
        $data['episode_snacks'] = $this->buildEpisodeSnacks($data);
        $data['people'] = $this->buildPeople($data);
        $data['films'] = $this->buildFilms($data);
        $data['film_people'] = $this->buildFilmPeople($data);

        foreach ($data as $table_name => $rows) {
            $this->table($table_name)->insert($rows)->save();
        }
    }

    protected function buildUsers(): array
    {
        $data = [
            [
                'id' => 1,
                'name' => 'angelxmoreno',
                'email' => 'angelxmoreno@example.com',
                'password' => 'Loremipsumdolorsitamet',
                'created' => '2022-07-25 01:28:17',
                'modified' => '2022-08-25 01:28:17',
            ],
        ];
        for ($i = 2; $i <= self::NUM_USERS; $i++) {
            $data[] = [
                'id' => $i,
                'name' => FakerBuilder::getInstance()->name(),
                'email' => FakerBuilder::getInstance()->email(),
                'password' => FakerBuilder::getInstance()->email(),
                'created' => '2022-09-25 01:28:17',
                'modified' => '2022-09-25 01:28:17',
            ];
        }

        return $data;
    }

    protected function buildEpisodes(): array
    {
        $data = [];
        for ($i = 0; $i < 62; $i++) {
            $data[] = [
                'id' => $i + 1,
                'episode_number' => str_pad((string)$i, 3, '0', STR_PAD_LEFT),
                'created' => '2022-09-25 01:28:15',
                'modified' => '2022-09-25 01:28:15',
            ];
        }

        return $data;
    }

    protected function buildEpisodeAttributes(): array
    {
        $attributes = [
            'title' => 'text',
            'date_aired' => 'datetime',
            'was_momo_mentioned' => 'bool',
            'did_momo_intro' => 'bool',
            'did_edward_host' => 'bool',
            'week_rating' => 'int',
            'mentioned_slice_that_like_button' => 'bool',
            'pulls_out_shotgun' => 'bool',
            'pulls_out_katana' => 'bool',
            'snacks' => 'element',
            'films' => 'element',
        ];
        $data = [];
        $id = 0;
        foreach ($attributes as $name => $type) {
            $id++;
            $data[] = [
                'id' => $id,
                'name' => $name,
                'type' => $type,
                'created' => '2022-09-25 01:28:15',
                'modified' => '2022-09-25 01:28:15',
            ];
        }

        return $data;
    }

    protected function buildEpisodeAttributeValues(array $rows): array
    {
        $data = [];
        $users = FakerBuilder::getInstance()->randomElements($rows['users'], ceil(count($rows['users']) * .75));
        $id = 1;
        foreach ($users as $user) {
            $numEntries = FakerBuilder::getInstance()->numberBetween(2, 5);
            for ($i = 1; $i <= $numEntries; $i++) {
                $created = FakerBuilder::getInstance()->dateTimeBetween('-1 month', 'now');
                $episode = FakerBuilder::getInstance()->randomElement($rows['episodes']);
                $attribute = FakerBuilder::getInstance()->randomElement($rows['episode_attributes']);
                switch ($attribute['type']) {
                    case 'datetime':
                        $value = FakerBuilder::getInstance()->dateTimeBetween('-3 years', '-1 month')->format('y-m-d H:i:s');
                        break;
                    case 'text':
                        $value = FakerBuilder::getInstance()->sentence(3);
                        break;
                    case 'bool':
                        $value = FakerBuilder::getInstance()->boolean();
                        break;
                    case 'int':
                        $value = FakerBuilder::getInstance()->numberBetween(0, 10);
                        break;
                    default:
                        $value = null;
                }
                if (!is_null($value)) {
                    $data[] = [
                        'id' => $id++,
                        'user_id' => $user['id'],
                        'episode_id' => $episode['id'],
                        'episode_attribute_id' => $attribute['id'],
                        'value' => $value,
                        'created' => $created->format('y-m-d H:i:s'),
                        'modified' => $created->format('y-m-d H:i:s'),
                    ];
                }
            }

        }
        return $data;
    }

    protected function buildSnacks(): array
    {
        $data = [];
        for ($i = 1; $i <= self::NUM_SNACKS; $i++) {
            $data[] = [
                'id' => $i,
                'name' => FakerBuilder::getInstance()->colorName() . ' ' . FakerBuilder::getInstance()->jobTitle(),
                'brand' => FakerBuilder::getInstance()->company(),
                'type' => FakerBuilder::getInstance()->randomElement(['sandwich', 'juice', 'water', 'chips', 'meal', 'fast food', 'other']),
                'created' => '2022-09-25 01:28:17',
                'modified' => '2022-09-25 01:28:17',
            ];
        }

        return $data;
    }

    protected function buildEpisodeSnacks(array $rows): array
    {
        $data = [];
        $users = FakerBuilder::getInstance()->randomElements($rows['users'], ceil(count($rows['users']) * .25));
        $id = 1;
        foreach ($users as $user) {
            $numEntries = FakerBuilder::getInstance()->numberBetween(1, 3);
            for ($i = 1; $i <= $numEntries; $i++) {
                $created = FakerBuilder::getInstance()->dateTimeBetween('-1 month', 'now');
                $episode = FakerBuilder::getInstance()->randomElement($rows['episodes']);
                $snack = FakerBuilder::getInstance()->randomElement($rows['snacks']);
                $data[] = [
                    'id' => $id++,
                    'user_id' => $user['id'],
                    'episode_id' => $episode['id'],
                    'snack_id' => $snack['id'],
                    'created' => $created->format('y-m-d H:i:s'),
                    'modified' => $created->format('y-m-d H:i:s'),
                ];
            }

        }
        return $data;
    }

    protected function buildPeople(array $rows): array
    {
        $data = [];
        for ($i = 1; $i <= self::NUM_PEOPLE; $i++) {
            $data[] = [
                'id' => $i,
                'user_id' => FakerBuilder::getInstance()->randomElement($rows['users'])['id'],
                'name' => FakerBuilder::getInstance()->name(),
                'created' => '2022-09-25 01:28:17',
                'modified' => '2022-09-25 01:28:17',
            ];
        }

        return $data;
    }

    protected function buildFilms(array $rows): array
    {
        $data = [];
        for ($i = 1; $i <= self::NUM_FILMS; $i++) {
            $data[] = [
                'id' => $i,
                'user_id' => FakerBuilder::getInstance()->randomElement($rows['users'])['id'],
                'episode_id' => FakerBuilder::getInstance()->randomElement($rows['episodes'])['id'],
                'submitted_by' => FakerBuilder::getInstance()->randomElement($rows['people'])['id'],
                'title' => FakerBuilder::getInstance()->name(). ' Dies',
                'link' => FakerBuilder::getInstance()->url(),
                'created' => '2022-09-25 01:28:17',
                'modified' => '2022-09-25 01:28:17',
            ];
        }

        return $data;
    }

    protected function buildFilmPeople(array $rows): array
    {
        $data = [];
        for ($i = 1; $i <= self::NUM_FILM_PEOPLE; $i++) {
            $data[] = [
                'id' => $i,
                'user_id' => FakerBuilder::getInstance()->randomElement($rows['users'])['id'],
                'film_id' => FakerBuilder::getInstance()->randomElement($rows['films'])['id'],
                'person_id' => FakerBuilder::getInstance()->randomElement($rows['people'])['id'],
                'created' => '2022-09-25 01:28:17',
                'modified' => '2022-09-25 01:28:17',
            ];
        }

        return $data;
    }

}
