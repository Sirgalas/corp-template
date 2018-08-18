<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\search\AddFieldsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Add Fields', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key',
            'value',
            'create_at',
            'update_at',
            //'program_id',
            //'author_id',
            //'last_redactor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
