<?php

use yii\db\Migration;
use app\entities\Image;
use app\entities\User;

/**
 * Handles the creation of table `info_page`.
 */
class m180814_175524_create_info_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('info_page', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255),
            'slug'=>$this->string(255),
            'description'=>$this->text(),
            'image_id'=>$this->integer(),
            'author_id'=>$this->integer(),
            'last_redactor_id'=>$this->integer(),
        ]);

        $this->createIndex('info_page_image_id','{{%info_page}}','image_id');

        $this->addForeignKey(
            'fk-info_page-image_id',
            '{{%gallery}}',
            'image_id',
            Image::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('info_page_author_id','{{%info_page}}','author_id');

        $this->addForeignKey(
            'fk-info_page-author_id',
            '{{%info_page}}',
            'author_id',
            User::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('info_page_redactor_id','{{%info_page}}','last_redactor_id');

        $this->addForeignKey(
            'fk-info_page-last_redactor_id',
            '{{%info_page}}',
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
        $this->dropForeignKey('fk-info_page-author_id','{{%gallery}}');
        $this->dropIndex('info_page_image_id','{{%teachers}}');
        $this->dropForeignKey('fk-info_page-last_redactor_id','{{%gallery}}');
        $this->dropIndex('info_page_redactor_id','{{%gallery}}');
        $this->dropForeignKey('fk-info_page-author_id','{{%gallery}}');
        $this->dropIndex('info_page_author_id','{{%gallery}}');
        $this->dropTable('info_page');
    }
}
