<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\entities\Teachers;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\forms\teachers\CreateForm */
/* @var $form yii\widgets\ActiveForm
 * @var $imageRepository app\repositories\ImageRepository
 */

?>
<div class="box box-primary">
    <div class="box-body">
        <div class="teachers-form">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sex')->dropDownList(Teachers::$nameSex) ?>

            <?= $form->field($model, 'description')->widget(CKEditor::class, [
                'options' => ['rows' => 6],
                'preset' => 'full',
                'clientOptions' => [
                    'filebrowserImageUploadUrl' => '/files/upload'
                ]
            ]) ?>

            <?= $form->field($model, 'status')->dropDownList(Teachers::$nameStatus) ?>

            <?= $form->field($imageForm, 'file')->widget(FileInput::class,$imageRepository->imageSeting(Teachers::FOLDER,$image_id)); ?>

            <?= $form->field($model,'image_id')->hiddenInput(['class'=>'image_id']) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
