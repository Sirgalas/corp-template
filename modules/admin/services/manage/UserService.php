<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.08.18
 * Time: 22:26
 */

namespace app\modules\admin\services\manage;

use app\entities\User;
use app\modules\admin\forms\user\CreateForm;
use app\modules\admin\forms\user\EditForm;

class UserService
{
    public function create(CreateForm $form) : User
    {
        $user=User::create($form->username,$form->password,$form->email);
        if(!$user->save())
            throw new \DomainException($user->errors);
        return $user;
    }

    public function edit(EditForm $form,User $user){
        $user->edit($form);
        if(!$user->save())
            throw new \DomainException($user->errors);

    }

}
