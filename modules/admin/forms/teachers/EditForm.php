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
 * @property string $image_id;
 */

class EditForm  extends Model
{
    public $sex;
    public $status;
    public $description;
    public $name;
    public $last_name;
    public $image_id;

    public function __construct(Teachers $teachers, $config = [])
    {
        $this->sex=$teachers->sex;
        $this->status=$teachers->status;
        $this->description=$teachers->description;
        $this->name=$teachers->name;
        $this->last_name=$teachers->last_name;
        $this->image_id=$teachers->image_id;
        parent::__construct($config);
    }

    public function rules()
    {

        return [
            [['image_id'],'required','message'=>'Загрузите картинку'],
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
            'image_id' => 'Картинка',
        ];
    }
}
