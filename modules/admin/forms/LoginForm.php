<?php

namespace app\modules\admin\forms;

use app\entities\User;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            [['password','username'],'string'],
        ];
    }


}
