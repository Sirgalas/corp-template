<?php

namespace app\modules\admin\forms\teachers;

use app\entities\Teachers;
use yii\base\Model;

/**
 * Class EditForm
 * @package app\modules\admin\forms\teachers
 * @property integer $sex
 * @property integer $status;
 * @property string $description;
 * @property string $name;
 * @property string $last_name;
 * @property string $image;
 */

class EditForm  extends Model
{
    public $sex;
    public $status;
    public $description;
    public $name;
    public $last_name;
    public $image;

    public function __construct(Teachers $teachers, $config = [])
    {
        $this->sex=$teachers->sex;
        $this->status=$teachers->status;
        $this->description=$teachers->description;
        $this->name=$teachers->name;
        $this->last_name=$teachers->last_name;
        $this->image=$teachers->image;
        parent::__construct($config);
    }

    public function rules()
    {

        return [
            [['sex', 'status'], 'integer'],
            [['description'], 'string'],
            [['name', 'last_name'], 'string', 'max' => 255],
            ['image','file', 'extensions' => 'png, jpg'],

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
            'image_id' => 'Картинка',
        ];
    }
}
