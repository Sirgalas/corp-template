<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\entities\AddFields */

$this->title = 'Create Add Fields';
$this->params['breadcrumbs'][] = ['label' => 'Add Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
