<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.08.18
 * Time: 22:04
 */

namespace app\modules\admin\forms\user;

use yii\base\Model;
use app\entities\User;

/**
 * Class CreateForm
 * @package app\modules\admin\forms\user
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $status
 */

class CreateForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username','email','password'],'required'],
            [['username','password'],'string'],
            ['email','email'],
            [['username', 'email'], 'unique', 'targetClass' => User::class],
            ['status','integer']
        ];
    }

    public function  attributeLabels()
    {
        return[
            'username'=>'Логин',
            'email'=>'Email',
            'password'=>'Пароль',
            'status'=>'Роль'
        ];
    }

}
