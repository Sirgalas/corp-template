<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\entities\InfoPage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Info Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'title',
            'slug',
            'description:ntext',
            'image_id',
            'author_id',
            'last_redactor_id',
        ],
    ]) ?>

</div>
