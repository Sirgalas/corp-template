<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\entities\Teachers;

/* @var $this yii\web\View */
/* @var $searchModel app\search\TeachersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <p>
        <?= Html::a('Create Teachers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    'slug',
                    [
                        'attribute'=>'sex',
                        'value'=> function($model){
                            return $model->nameSex;
                        },
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter' => Teachers::$nameSex
                    ],
                    [
                        'attribute'=>'status',
                        'value'=>function($model){
                            return $model->nameStatus;
                        },
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter' => Teachers::$nameStatus
                    ],
                    [
                        'attribute'=>'image_id',
                        'format'=>'raw',
                        'value'=>function($model){
                            return $model->image->getUrl(Teachers::FOLDER);
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
