<?php

namespace app\controllers;

use Yii;
use app\entities\Image;
use yii\web\Controller;
use yii\web\UploadedFile;

class FileController extends Controller
{
    public function beforeAction($action)
    {
        if ($action->id == 'upload') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return true;

    }

    public function actionUpload($CKEditorFuncNum)
    {
        $file = UploadedFile::getInstanceByName('upload');
        var_dump($file);
        exit();
        if ($file)
        {
            $file_model = new Image;

            if ($file_model->upload($file) && $file_model->save())
                return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$CKEditorFuncNum.'", "'.$file_model->imageUrl.'", "");</script>';
            else
                return "Возникла ошибка при загрузке файла\n";
        }
        else
            return "Файл не загружен\n";
    }
}
