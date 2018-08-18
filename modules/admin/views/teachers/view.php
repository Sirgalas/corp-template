<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\entities\Teachers;
/* @var $this yii\web\View */
/* @var $model app\entities\Teachers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Учителя', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-view">

    <p>
        <?= Html::a('Редактирова', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="box box-info">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'slug',
                    [
                        'attribute'=>'sex',
                        'value'=> function($model){
                            return $model->nameSex;
                        },
                    ],
                    [
                        'attribute'=>'description',
                        'format'=>'raw'
                    ],

                    'create_at:datetime',
                    'update_at:datetime',
                    [
                        'attribute'=>'status',
                        'value'=>function($model){
                            return $model->nameStatus;
                        },
                    ],
                    [
                        'attribute'=>'image_id',
                        'format'=>'raw',
                        'value'=>function($model){
                            return Html::img($model->image->getUrl(Teachers::FOLDER).DIRECTORY_SEPARATOR.$model->image->name,['height'=>200]);
                        }
                    ],
                    [
                        'attribute'=>'author_id',
                        'value'=>function($model)
                        {
                            return $model->author->username;
                        }
                    ],
                    'last_redactor_id',
                ],
            ]) ?>
        </div>
    </div>
</div>
