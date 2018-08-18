<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\entities\User;

/* @var $this yii\web\View */
/* @var $searchModel app\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'username',
                    'email:email',
                    [
                        'attribute'=> 'status',
                        'value'=>function($model){
                            return $model->statusName;
                        },
                        'filterType'=>GridView::FILTER_SELECT2,
                        'filter'=>User::$statusName
                    ],
                    [
                       'attribute'=>'created_at',
                       'format'=>'dateTime',
                       'filterType'=>GridView::FILTER_DATE,
                       'filter'=>User::$statusName
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
