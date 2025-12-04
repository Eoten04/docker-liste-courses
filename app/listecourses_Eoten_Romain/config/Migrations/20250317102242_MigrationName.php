<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class MigrationName extends BaseMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up(): void
    {
        $this->table('ingredients')
            ->addColumn('name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('picture', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
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
                    'id',
                ],
                [
                    'name' => 'sqlite_autoindex_ingredients_1',
                    'unique' => true,
                ]
            )
            ->create();

        $this->table('ingredients_recipies')
            ->addColumn('recipie_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('ingredient_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('quantity', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('unity', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
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
                    'id',
                ],
                [
                    'name' => 'sqlite_autoindex_ingredients_recipies_1',
                    'unique' => true,
                ]
            )
            ->create();

        $this->table('recipies')
            ->addColumn('name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('prepTime', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('picture', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
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
                    'id',
                ],
                [
                    'name' => 'sqlite_autoindex_recipies_1',
                    'unique' => true,
                ]
            )
            ->create();

        $this->table('steps')
            ->addColumn('numStep', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('desc', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('picture', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('recipie_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
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
                    'id',
                ],
                [
                    'name' => 'sqlite_autoindex_steps_1',
                    'unique' => true,
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
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
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addIndex(
                [
                    'id',
                ],
                [
                    'name' => 'sqlite_autoindex_users_1',
                    'unique' => true,
                ]
            )
            ->create();

        $this->table('ingredients_recipies')
            ->addForeignKey(
                'recipie_id',
                'recipies',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'recipie_id_0_fk'
                ]
            )
            ->addForeignKey(
                'ingredient_id',
                'ingredients',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'ingredient_id_1_fk'
                ]
            )
            ->update();

        $this->table('steps')
            ->addForeignKey(
                'recipie_id',
                'recipies',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'steps_recipie_id_fk'
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
    public function down(): void
    {
        $this->table('ingredients_recipies')
            ->dropForeignKey(
                'recipie_id'
            )
            ->dropForeignKey(
                'ingredient_id'
            )->save();

        $this->table('steps')
            ->dropForeignKey(
                'recipie_id'
            )->save();

        $this->table('ingredients')->drop()->save();
        $this->table('ingredients_recipies')->drop()->save();
        $this->table('recipies')->drop()->save();
        $this->table('steps')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
