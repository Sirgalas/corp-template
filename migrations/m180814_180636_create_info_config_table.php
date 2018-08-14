<?php

use yii\db\Migration;

/**
 * Handles the creation of table `info_config`.
 */
class m180814_180636_create_info_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%config}}', [
            'id' => $this->primaryKey(),
            'key'=>$this->string(),
            'value'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%config}}');
    }
}
