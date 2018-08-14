<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\entities\TeacherProgram */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-program-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teachers_id')->textInput() ?>

    <?= $form->field($model, 'programs_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
