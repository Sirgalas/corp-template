<?php

namespace app\entities;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $create_at
 * @property string $update_at
 * @property int $image_id
 * @property int $author_id
 * @property int $last_redactor_id
 *
 * @property User $author
 * @property Image $image
 * @property User $lastRedactor
 * @property Image $image0
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'update_at'], 'safe'],
            [['image_id', 'author_id', 'last_redactor_id'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
            [['last_redactor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['last_redactor_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
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
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
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
    public function getImage0()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }
}
