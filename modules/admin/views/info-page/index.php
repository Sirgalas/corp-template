<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\search\InfoPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Info Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Info Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'slug',
            'description:ntext',
            'image_id',
            //'author_id',
            //'last_redactor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
