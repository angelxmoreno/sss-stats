<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * YouTubeVideosFixture
 */
class YouTubeVideosFixture extends TestFixture
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
                'uid' => 'Lorem ipsum dolor sit amet',
                'title' => 'Lorem ipsum dolor sit amet',
                'channel_title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'tags' => '',
                'thumbnails' => '',
                'duration' => 'Lorem ipsum dolor sit amet',
                'comment_count' => 1,
                'dislike_count' => 1,
                'favorite_count' => 1,
                'like_count' => 1,
                'view_count' => 1,
                'published' => '2022-10-01 17:57:13',
                'created' => '2022-10-01 17:57:13',
                'modified' => '2022-10-01 17:57:13',
                'deleted' => '2022-10-01 17:57:13',
            ],
        ];
        parent::init();
    }
}
