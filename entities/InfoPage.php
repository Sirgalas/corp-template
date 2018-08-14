<?php

namespace app\entities;

use Yii;

/**
 * This is the model class for table "info_page".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property int $image_id
 * @property int $author_id
 * @property int $last_redactor_id
 *
 * @property User $author
 * @property User $lastRedactor
 */
class InfoPage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['image_id', 'author_id', 'last_redactor_id'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['last_redactor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['last_redactor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'image_id' => 'Image ID',
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
}
