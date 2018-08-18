<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\entities\AddFields */

$this->title = 'Update Add Fields: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Add Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="add-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
