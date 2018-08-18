<?php


namespace app\modules\admin\services\auth;

use app\modules\admin\forms\LoginForm;
use app\entities\User;
use app\repositories\UserRepository;

class AuthService
{
    public $users;
    public function __construct(UserRepository $users)
    {
        $this->users=$users;
    }

    public function auth(LoginForm $form): User
    {
        $user=$this->users->findByUsernameOrEmail($form->username);
        if(!$user->validatePassword($form->password))
            throw new \DomainException('Undefined user or password.');
        return $user;
    }


}
