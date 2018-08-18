<?php

/* @var $this yii\web\View */
/* @var $model app\entities\Teachers */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Учителя', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-create">

    <?= $this->render('_form', [
        'model' => $model,
        'imageRepository'=>$imageRepository,
        'image_id'=>$image_id,
        'imageForm'=>$imageForm
    ]) ?>

</div>
