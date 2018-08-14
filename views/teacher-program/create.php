<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\entities\TeacherProgram */

$this->title = 'Create Teacher Program';
$this->params['breadcrumbs'][] = ['label' => 'Teacher Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-program-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
