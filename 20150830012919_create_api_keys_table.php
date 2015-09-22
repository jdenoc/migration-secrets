<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateApiKeysTable extends AbstractMigration
{

    /**
     * Migrate Up
     * Create `api_keys` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
	public function up(){
        $table = $this->table('api_keys', array('id'=>false, 'primary_key' => 'id'));
        $table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $table->addColumn('api_key', 'string', array('limit'=>100));
        $table->addColumn('user_id', 'integer', array('signed'=>false));
        $table->addColumn('udid', 'string');
        $table->addColumn('expired', 'integer', array('limit'=>MysqlAdapter::INT_TINY, 'default'=>0));
        $table->addColumn('expiration_stamp', 'timestamp', array('default'=>'CURRENT_TIMESTAMP'));
        $table->addIndex(array('api_key'), array('unique' => true));
        $table->save();
    }

    /**
     * Migrate Down
     * Drop `api_keys` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('api_keys');
    }
}