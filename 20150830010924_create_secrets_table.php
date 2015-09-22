<?php

use Phinx\Migration\AbstractMigration;

class CreateSecretsTable extends AbstractMigration
{

    /**
     * Migrate Up
     * Create `secrets` Table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('secrets', array('id'=>false, 'primary_key' => 'id'));
        $table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $table->addColumn('name', 'string', array('limit'=>100));
        $table->addColumn('url', 'string');
        $table->addColumn('username', 'string');
        $table->addColumn('encrypted_password', 'string', array('limit'=>500));
        $table->addColumn('password_length', 'integer', array('signed'=>false));
        $table->addColumn('notes', 'text');
        $table->addColumn('user_id', 'integer', array('signed'=>false));
        $table->addColumn('create_stamp', 'datetime');
        $table->addColumn('modified_stamp', 'timestamp', array('default'=>'CURRENT_TIMESTAMP', 'update'=>'CURRENT_TIMESTAMP'));
        $table->addIndex(array('id', 'user_id'));
        $table->save();
    }

    /**
     * Migrate Down
     * Drop `secrets` Table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('secrets');
    }
}