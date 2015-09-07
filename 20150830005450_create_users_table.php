<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{

    /**
     * Migrate UP
     * Create `users` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('users', array('id'=>false, 'primary_key' => 'id'));
        $table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $table->addColumn('email', 'string');
        $table->addColumn('passphrase', 'string');
        $table->addIndex(array('email'), array('unique' => true));
        $table->save();
    }

    /**
     * Migrate down
     * Drop `users` Table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('users');
    }
}
