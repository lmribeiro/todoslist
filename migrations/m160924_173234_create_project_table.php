<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `todo`.
 */
class m160924_173234_create_project_table extends Migration
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

        $this->createTable('project', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER.' not null',
            'name' => Schema::TYPE_STRING.' not null',
            'created_at' => Schema::TYPE_TIMESTAMP.' null default CURRENT_TIMESTAMP',
            'deleted' => Schema::TYPE_SMALLINT.' not null default 0',
            'deleted_at' => Schema::TYPE_TIMESTAMP.' null'
                ]
        );

        $this->createIndex(
                'idx-project-user_id', 'project', 'user_id'
        );
        $this->addForeignKey(
                'fk-project-user_id', 'project', 'user_id', 'user', 'id', 'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('project');
    }

}
