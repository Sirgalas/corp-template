<?php

use yii\db\Migration;

/**
 * Class m180814_202416_add_column_icon_from_program_table
 */
class m180814_202416_add_column_icon_from_program_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180814_202416_add_column_icon_from_program_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180814_202416_add_column_icon_from_program_table cannot be reverted.\n";

        return false;
    }
    */
}
