<?php

namespace app\commands;

use yii\console\Controller;
use app\entities\User;
class SignupController  extends Controller
{
       public function actionSignup(){
           $user=User::create('admin','1','admin@admin.com',User::STATUS_ADMIN);
           $user->save();
       }
}
