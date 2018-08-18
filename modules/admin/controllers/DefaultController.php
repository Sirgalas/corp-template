<?php

namespace app\modules\admin\controllers;

use app\modules\admin\forms\LoginForm;
use app\modules\admin\services\auth\AuthService;
use yii\web\Controller;
use Yii;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $service;
    public function __construct(string $id, $module,AuthService $service, array $config = [])
    {

        parent::__construct($id, $module, $config);
        $this->service=$service;
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
            return $this->redirect('/admin/default/login');
        return $this->render('index');
    }

    public function actionLogin(){
        $forms= new LoginForm();
        $this->layout ='@app/modules/admin/views/default/login';
        if($forms->load(Yii::$app->request->post())&&$forms->validate())
        {
            try{
                $user=$this->service->auth($forms);
                Yii::$app->user->login($user, $forms->rememberMe ? Yii::$app->params['user.rememberMeDuration'] : 0);
                $this->redirect('/admin');
            }catch (\DomainException $e){
              Yii::error($e);
              Yii::$app->session->setFlash('error',$e->getMessage());
            }
        }
        return $this->render('login-form',[
            'forms'=>$forms
        ]);

    }
}
