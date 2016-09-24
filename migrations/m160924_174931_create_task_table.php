<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `task`.
 */
class m160924_174931_create_task_table extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('task', [
            'id' => Schema::TYPE_PK,
            'project_id' => Schema::TYPE_INTEGER.' not null',
            'description' => Schema::TYPE_STRING.' not null',
            'created_at' => Schema::TYPE_TIMESTAMP.' null default CURRENT_TIMESTAMP',
            'finished' => Schema::TYPE_SMALLINT.' not null default 0',
            'finished_at' => Schema::TYPE_TIMESTAMP.' null'
                ], $tableOptions
        );

        $this->createIndex(
                'idx-task-project_id', 'task', 'project_id'
        );
        $this->addForeignKey(
                'fk-task-project_id', 'task', 'project_id', 'project', 'id', 'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('task');
    }

}
