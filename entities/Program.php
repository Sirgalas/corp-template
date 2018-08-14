<?php

namespace app\entities;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $create_at
 * @property string $update_at
 * @property int $image_id
 * @property int $author_id
 * @property int $last_redactor_id
 * @property string $icon
 * @property User $author
 * @property Image $image
 * @property User $lastRedactor
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['image_id', 'author_id', 'last_redactor_id'], 'integer'],
            [['title', 'slug','icon'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::class, 'targetAttribute' => ['image_id' => 'id']],
            [['last_redactor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['last_redactor_id' => 'id']],
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
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'image_id' => 'Image ID',
            'author_id' => 'Author ID',
            'last_redactor_id' => 'Last Redactor ID',
            'icon'=>'Icon'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::class, ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLastRedactor()
    {
        return $this->hasOne(User::class, ['id' => 'last_redactor_id']);
    }
}
