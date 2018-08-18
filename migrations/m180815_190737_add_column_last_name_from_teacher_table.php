<?php

use yii\db\Migration;
use app\entities\Teachers;

/**
 * Class m180815_190737_add_column_last_name_from_teacher_table
 */
class m180815_190737_add_column_last_name_from_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn(Teachers::tableName(),'last_name',$this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(Teachers::tableName(),'last_name');
    }


}
