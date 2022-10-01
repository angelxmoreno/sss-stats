<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class YouTubeComments extends AbstractMigration
{
    public $autoId = false;

    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('you_tube_comment_authors')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => '',
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('image_url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('channel_uid', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'name',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('you_tube_comments')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('uid', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('you_tube_comment_author_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('parent_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('you_tube_video_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('can_reply', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('is_public', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('total_reply_count', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('can_rate', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('like_count', 'integer', [
                'default' => '0',
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('published_at', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('text_display', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('text_original', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('updated_at', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'uid',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'you_tube_video_id',
                ]
            )
            ->addIndex(
                [
                    'you_tube_comment_author_id',
                ]
            )
            ->addIndex(
                [
                    'parent_id',
                ]
            )
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {

        $this->table('you_tube_comment_authors')->drop()->save();
        $this->table('you_tube_comments')->drop()->save();
    }
}
