<?php

namespace app\entities;

use Yii;

/**
 * This is the model class for table "teacher_program".
 *
 * @property int $teachers_id
 * @property int $programs_id
 *
 * @property Program $programs
 * @property Teachers $teachers
 */
class TeacherProgram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher_program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teachers_id', 'programs_id'], 'required'],
            [['teachers_id', 'programs_id'], 'integer'],
            [['teachers_id', 'programs_id'], 'unique', 'targetAttribute' => ['teachers_id', 'programs_id']],
            [['programs_id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['programs_id' => 'id']],
            [['teachers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['teachers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'teachers_id' => 'Teachers ID',
            'programs_id' => 'Programs ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasOne(Program::className(), ['id' => 'programs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'teachers_id']);
    }
}
