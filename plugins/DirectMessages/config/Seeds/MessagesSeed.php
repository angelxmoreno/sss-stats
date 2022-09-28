<?php
declare(strict_types=1);

use App\Utility\FakerBuilder;
use DirectMessages\Service\DirectMessageService;
use Migrations\AbstractSeed;

/**
 * Messages seed.
 */
class MessagesSeed extends AbstractSeed
{
    const main_user_id = 21;
    const max_user_id = 23;

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
        $service = DirectMessageService::getInstance();
        $faker = FakerBuilder::getInstance();

        //messages I sent first
        for ($i = 1; $i < 5; $i++) {
            $service->sendMessage(self::main_user_id, $i, $faker->sentences(3, true));
        }

        //messages to me that are unread
        for ($i = 5; $i < 10; $i++) {
            $service->sendMessage($i, self::main_user_id, $faker->sentences(3, true));
        }

        //messages i replied to
        for ($i = 10; $i < 15; $i++) {
            $service->sendMessage($i, self::main_user_id, $faker->sentences(3, true));
            $service->sendMessage(self::main_user_id, $i, 'what is this chiberish ?');
        }

        //other user messages
        for ($i = 1; $i < 23; $i++) {
            $numMessages = $faker->numberBetween(0, 5);
            for ($j = 0; $j < $numMessages; $j++) {
                $toUser = $faker->numberBetween(1, self::max_user_id);
                if ($i !== $toUser && $i !== self::main_user_id && $toUser !== self::main_user_id) {
                    $service->sendMessage($i, $toUser, $faker->sentences(3, true));
                }
            }
            $service->sendMessage($i, self::main_user_id, $faker->sentences(3, true));
            $service->sendMessage(self::main_user_id, $i, 'what is this chiberish ?');
        }
    }
}
