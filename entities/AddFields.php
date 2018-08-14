<?php

namespace app\entities;

use Yii;

/**
 * This is the model class for table "add_fields".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $create_at
 * @property string $update_at
 * @property int $program_id
 * @property int $author_id
 * @property int $last_redactor_id
 *
 * @property User $author
 * @property User $lastRedactor
 * @property Program $program
 */
class AddFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'add_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'update_at'], 'safe'],
            [['program_id', 'author_id', 'last_redactor_id'], 'integer'],
            [['key', 'value'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['last_redactor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['last_redactor_id' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['program_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'program_id' => 'Program ID',
            'author_id' => 'Author ID',
            'last_redactor_id' => 'Last Redactor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLastRedactor()
    {
        return $this->hasOne(User::className(), ['id' => 'last_redactor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'program_id']);
    }
}
