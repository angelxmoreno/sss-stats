<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AuthProviders extends AbstractMigration
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
        $this->table('auth_providers')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('provider', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('identifier', 'string', [
                'default' => '',
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('email_verified', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('picture_url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('access_token', 'text', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('refresh_token', 'text', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('token_expires', 'datetime', [
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
                    'provider',
                    'identifier',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'provider',
                ]
            )
            ->addIndex(
                [
                    'identifier',
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('google_auth_provider_id', 'integer', [
                'after' => 'id',
                'default' => null,
                'length' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('picture_url', 'text', [
                'after' => 'password',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'google_auth_provider_id',
                ],
                [
                    'name' => 'google_auth_provider_id',
                    'unique' => true,
                ]
            )
            ->update();
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

        $this->table('users')
            ->removeIndexByName('google_auth_provider_id')
            ->update();

        $this->table('users')
            ->removeColumn('google_auth_provider_id')
            ->removeColumn('picture_url')
            ->update();

        $this->table('auth_providers')->drop()->save();
    }
}
