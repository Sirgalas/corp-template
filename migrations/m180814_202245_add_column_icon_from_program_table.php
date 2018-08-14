<?php

use yii\db\Migration;

/**
 * Class m180814_202245_add_column_icon_from_program_table
 */
class m180814_202245_add_column_icon_from_program_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\app\entities\Program::tableName(),'icon',$this->string(255));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(\app\entities\Program::tableName(),'icon');
    }


}
