<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.08.18
 * Time: 22:48
 */

namespace app\repositories;

use app\entities\User;

class UserRepository
{
    public function findByUsernameOrEmail($value): ? User
    {
        return User::find()->andWhere(['or', ['username' => $value], ['email' => $value]])->one();
    }
}
