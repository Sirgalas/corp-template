<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\entities\TeacherProgram */

$this->title = $model->teachers_id;
$this->params['breadcrumbs'][] = ['label' => 'Teacher Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-program-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'teachers_id' => $model->teachers_id, 'programs_id' => $model->programs_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'teachers_id' => $model->teachers_id, 'programs_id' => $model->programs_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'teachers_id',
            'programs_id',
        ],
    ]) ?>

</div>
