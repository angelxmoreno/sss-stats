<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * YouTubeVideoCountsFixture
 */
class YouTubeVideoCountsFixture extends TestFixture
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
                'you_tube_video_id' => 1,
                'comment_count' => 1,
                'dislike_count' => 1,
                'favorite_count' => 1,
                'like_count' => 1,
                'view_count' => 1,
                'created' => '2022-09-30 05:52:13',
                'modified' => '2022-09-30 05:52:13',
            ],
        ];
        parent::init();
    }
}
