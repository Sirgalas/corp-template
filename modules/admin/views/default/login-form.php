<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * @var $forms app\modules\admin\forms\LoginForm
 */
?>
<h1 class="text-center">Войти</h1>
<div class="col-md-4 col-md-offset-4 vcenter">
    <?php $form=ActiveForm::begin(); ?>

    <?= $form->field($forms,'username')->textInput(); ?>

    <?= $form->field($forms, 'password')->textInput(); ?>

    <?= $form->field($forms, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

    <?php ActiveForm::end(); ?>
</div>


