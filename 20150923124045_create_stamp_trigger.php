<?php

use Phinx\Migration\AbstractMigration;

class CreateStampTrigger extends AbstractMigration {

    /**
     * Migrate UP.
     * Create `secret_creation_timestamp` trigger
     * Trigger sets `create_stamp` datetime to NOW() on INSERT in `secrets` table
     * Change `create_stamp` column to timestamp type in `secrets` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $this->execute(
            "CREATE TRIGGER secret_creation_trigger
            BEFORE INSERT on secrets
            FOR EACH ROW
            SET NEW.create_stamp = NOW();"
        );

        $table = $this->table('secrets');
        $table->changeColumn('create_stamp', 'timestamp', array('null'=>true));
    }
    /**
     * Migrate DOWN.
     * Drop `secret_creation_trigger` trigger from `secrets` table
     * Change `create_stamp` column to datetime type in `secrets` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->execute("DROP TRIGGER IF EXISTS secret_creation_trigger;");

        $table = $this->table('secrets');
        $table->changeColumn('create_stamp', 'datetime', array('null'=>false));
    }
}
