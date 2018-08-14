<?php

use yii\db\Migration;
use app\entities\Program;
use app\entities\User;
/**
 * Handles the creation of table `add_fields`.
 */
class m180814_185639_create_add_fields_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('add_fields', [
            'id' => $this->primaryKey(),
            'key'=> $this->string(),
            'value'=>$this->string(),
            'create_at'=>$this->dateTime(),
            'update_at'=>$this->dateTime(),
            'program_id'=>$this->integer(),
            'author_id'=>$this->integer(),
            'last_redactor_id'=>$this->integer()
        ]);

        $this->createIndex('add_fields_program_id','{{%add_fields}}','program_id');

        $this->addForeignKey(
            'fk-add_fields-program_id',
            '{{%add_fields}}',
            'program_id',
            Program::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('add_fields_author_id','{{%add_fields}}','author_id');

        $this->addForeignKey(
            'fk-add_fields-author_id',
            '{{%add_fields}}',
            'author_id',
            User::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('add_fields_redactor_id','{{%add_fields}}','last_redactor_id');

        $this->addForeignKey(
            'fk-add_fields-last_redactor_id',
            '{{%add_fields}}',
            'last_redactor_id',
            User::tableName(),
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-add_fields-program_id','{{%add_fields}}');
        $this->dropIndex('add_fields_program_id','{{%add_fields}}');

        $this->dropForeignKey('fk-add_fields-author_id','{{%add_fields}}');
        $this->dropIndex('add_fields_author_id','{{%add_fields}}');

        $this->dropForeignKey('fk-add_fields-author_id','{{%add_fields}}');
        $this->dropIndex('add_fields_redactor_id','{{%add_fields}}');

        $this->dropTable('add_fields');
    }
}
