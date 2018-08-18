<?php

namespace app\modules\admin\forms\teachers;

use yii\base\Model;

/**
 * Class CreateForm
 * @package app\modules\admin\forms\teachers
 * @property integer $sex
 * @property integer $status
 * @property string $description
 * @property string $name
 * @property string $last_name
 * @property string $image
 * @property integer $image_id
 */

class CreateForm  extends Model
{
    public $sex;
    public $status;
    public $description;
    public $name;
    public $last_name;
    public $image_id;

    public function rules()
    {

        return [
            ['image_id','required','message'=>'Загрузите картинку'],
            [['sex', 'status','image_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'last_name'], 'string', 'max' => 255],


        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя ',
            'last_name'=>'Фамилия',
            'slug' => 'Ярлык',
            'sex' => 'Пол',
            'description' => 'Описание',
            'status' => 'Статус',
        ];
    }
}
