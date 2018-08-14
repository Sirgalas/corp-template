<?php

use yii\db\Migration;
use app\entities\Image;
use app\entities\User;
/**
 * Handles the creation of table `teachers`.
 */
class m180814_164754_create_teachers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teachers}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255),
            'slug'=>$this->string(255),
            'sex'=>$this->smallInteger(),
            'description'=>$this->text(),
            'create_at'=>$this->dateTime(),
            'update_at'=>$this->dateTime(),
            'status'=>$this->integer(),
            'image_id'=>$this->integer(),
            'author_id'=>$this->integer(),
            'last_redactor_id'=>$this->integer(),
        ]);

        $this->createIndex('teachers_image_id','{{%teachers}}','image_id');

        $this->addForeignKey(
            'fk-teachers-image_id',
            '{{%teachers}}',
            'image_id',
            Image::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('teachers_author_id','{{%teachers}}','author_id');
        $this->addForeignKey(
            'fk-teachers-author_id',
            '{{%teachers}}',
            'author_id',
            User::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('teachers_redactor_id','{{%teachers}}','last_redactor_id');
        $this->addForeignKey(
            'fk-teachers-last_redactor_id',
            '{{%teachers}}',
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
        $this->dropForeignKey('fk-teachers-author_id','{{%teachers}}');
        $this->dropIndex('teachers_image_id','{{%teachers}}');
        $this->dropForeignKey('fk-teachers-last_redactor_id','{{%teachers}}');
        $this->dropIndex('teachers_redactor_id','{{%teachers}}');
        $this->dropForeignKey('fk-teachers-author_id','{{%teachers}}');
        $this->dropIndex('teachers_author_id','{{%teachers}}');
        $this->dropTable('teachers');
    }
}
