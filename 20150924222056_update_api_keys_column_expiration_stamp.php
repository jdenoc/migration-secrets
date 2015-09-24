<?php

use Phinx\Migration\AbstractMigration;

class UpdateApiKeysColumnExpirationStamp extends AbstractMigration {

    /**
     * Migrate Up
     * Update `api_keys`.`expiration_stamp` column to default to NULL
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('api_keys');
        $table->changeColumn('expiration_stamp', 'timestamp', array('null'=>true));
    }

    /**
     * Migrate Down
     * Update `api_keys`.`expiration_stamp` column to default to CURRENT_TIMESTAMP
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $table = $this->table('api_keys');
        $table->changeColumn('expiration_stamp', 'timestamp', array('default'=>'CURRENT_TIMESTAMP'));
    }
}