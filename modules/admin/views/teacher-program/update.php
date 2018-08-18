<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\entities\TeacherProgram */

$this->title = 'Update Teacher Program: ' . $model->teachers_id;
$this->params['breadcrumbs'][] = ['label' => 'Teacher Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->teachers_id, 'url' => ['view', 'teachers_id' => $model->teachers_id, 'programs_id' => $model->programs_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teacher-program-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
