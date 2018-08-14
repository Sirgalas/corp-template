<?php

use yii\db\Migration;
use app\entities\Teachers;
use app\entities\Program;
/**
 * Handles the creation of table `teacher_program`.
 */
class m180814_183919_create_teacher_program_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher_program}}', [
            'teachers_id' => $this->integer(),
            'programs_id' => $this->integer(),
            'PRIMARY KEY(teachers_id, programs_id)',
        ]);
        $this->createIndex('teacher_program_teachers_id','{{%teacher_program}}','teachers_id');

        $this->addForeignKey(
            'fk-teacher_program-teachers_id',
            '{{%teacher_program}}',
            'teachers_id',
            Teachers::tableName(),
            'id',
            'CASCADE'
        );

        $this->createIndex('teacher_program_program_id','{{%teacher_program}}','programs_id');

        $this->addForeignKey(
            'fk-teacher_program-program_id',
            '{{%teacher_program}}',
            'programs_id',
            Program::tableName(),
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-teacher_program-teachers_id','{{%teacher_program}}');
        $this->dropIndex('teacher_program_teachers_id','{{%teacher_program}}');
        $this->dropForeignKey('fk-teacher_program-program_id','{{%teacher_program}}');
        $this->dropIndex('teacher_program_program_id','{{%teacher_program}}');
        $this->dropTable('{{%teacher_program}}');
    }
}
