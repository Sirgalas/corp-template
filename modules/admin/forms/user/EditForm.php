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
 * Class EditForm
 * @package app\modules\admin\forms\user
 * @property string $username
 * @property string $email
 */

class EditForm extends Model
{
    public $username;
    public $email;
    public function __construct(User $user, $config = [])
    {
        $this->username=$user->username;
        $this->email=$user->email;
        $this->_user=$user;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['username','email'],'required'],
            [['username'],'string'],
            ['email','email'],
            ['status','integer'],
            [['username','email'], 'unique', 'targetClass' => User::class, 'filter' => ['<>', 'id', $this->_user->id]],
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
