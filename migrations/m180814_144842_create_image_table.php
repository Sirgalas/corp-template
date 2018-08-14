<?php

use yii\db\Migration;
use app\entities\User;

/**
 * Handles the creation of table `image`.
 */
class m180814_144842_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'name'  => $this->string(255),
            'create_at'=>$this->dateTime(),
            'update_at'=>$this->dateTime(),
            'author_id'=>$this->integer(),
            'last_redactor_id'=>$this->integer()
        ],$tableOptions);

        $this->createIndex('image_autor','{{%image}}','author_id');
        $this->addForeignKey(
            'fk-image-author_id',
            '{{%image}}',
            'author_id',
            User::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('image_redactor_id','{{%image}}','last_redactor_id');
        $this->addForeignKey(
            'fk-image-last_redactor_id',
            '{{%image}}',
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
        $this->dropForeignKey('fk-image-last_redactor_id','{{%image}}');
        $this->dropIndex('image_redactor_id','{{%image}}');
        $this->dropForeignKey('fk-image-author_id','{{%image}}');
        $this->dropIndex('image_autor','{{%image}}');
        $this->dropTable('image');
    }
}
