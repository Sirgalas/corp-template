<?php

use yii\db\Migration;
use app\entities\Image;
use app\entities\User;

/**
 * Handles the creation of table `gallery`.
 */
class m180814_170701_create_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'create_at'=>$this->dateTime(),
            'update_at'=>$this->dateTime(),
            'image_id'=>$this->integer(),
            'author_id'=>$this->integer(),
            'last_redactor_id'=>$this->integer(),
        ]);

        $this->createIndex('gallery_image_id','{{%gallery}}','image_id');
        $this->addForeignKey(
            'fk-gallery-image_id',
            '{{%gallery}}',
            'image_id',
            Image::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('gallery_author_id','{{%gallery}}','author_id');
        $this->addForeignKey(
            'fk-gallery-author_id',
            '{{%gallery}}',
            'author_id',
            User::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('gallery_redactor_id','{{%gallery}}','last_redactor_id');
        $this->addForeignKey(
            'fk-gallery-last_redactor_id',
            '{{%gallery}}',
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
        $this->dropForeignKey('fk-gallery-author_id','{{%gallery}}');
        $this->dropIndex('gallery_image_id','{{%teachers}}');
        $this->dropForeignKey('fk-gallery-last_redactor_id','{{%gallery}}');
        $this->dropIndex('gallery_redactor_id','{{%gallery}}');
        $this->dropForeignKey('fk-gallery-author_id','{{%gallery}}');
        $this->dropIndex('gallery_author_id','{{%gallery}}');
        $this->dropTable('gallery');
    }
}
