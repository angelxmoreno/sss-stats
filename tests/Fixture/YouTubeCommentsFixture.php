<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * YouTubeCommentsFixture
 */
class YouTubeCommentsFixture extends TestFixture
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
                'you_tube_comment_author_id' => 1,
                'parent_id' => 1,
                'you_tube_video_id' => 1,
                'can_reply' => 1,
                'is_public' => 1,
                'total_reply_count' => 1,
                'can_rate' => 1,
                'like_count' => 1,
                'published_at' => '2022-10-01 17:56:19',
                'text_display' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'text_original' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'updated_at' => '2022-10-01 17:56:19',
                'created' => '2022-10-01 17:56:19',
                'modified' => '2022-10-01 17:56:19',
            ],
        ];
        parent::init();
    }
}
