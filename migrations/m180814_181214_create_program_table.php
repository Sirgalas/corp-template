<?php

use yii\db\Migration;
use app\entities\Image;
use app\entities\User;

/**
 * Handles the creation of table `program`.
 */
class m180814_181214_create_program_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%program}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255),
            'slug'=>$this->string(255),
            'description'=>$this->text(),
            'create_at'=>$this->dateTime(),
            'update_at'=>$this->dateTime(),
            'image_id'=>$this->integer(),
            'author_id'=>$this->integer(),
            'last_redactor_id'=>$this->integer(),
        ]);

        $this->createIndex('program_image_id','{{%program}}','image_id');

        $this->addForeignKey(
            'fk-program-image_id',
            '{{%program}}',
            'image_id',
            Image::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('program_author_id','{{%program}}','author_id');

        $this->addForeignKey(
            'fk-program-author_id',
            '{{%program}}',
            'author_id',
            User::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('program_redactor_id','{{%program}}','last_redactor_id');

        $this->addForeignKey(
            'fk-program-last_redactor_id',
            '{{%program}}',
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
        $this->dropForeignKey('fk-program-author_id','{{%program}}');
        $this->dropIndex('program_image_id','{{%teachers}}');
        $this->dropForeignKey('fk-program-last_redactor_id','{{%program}}');
        $this->dropIndex('program_redactor_id','{{%program}}');
        $this->dropForeignKey('fk-program-author_id','{{%program}}');
        $this->dropIndex('program_author_id','{{%program}}');
        $this->dropTable('program');
    }
}
