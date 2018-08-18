<?php

/* @var $this yii\web\View */
/* @var $model app\entities\Teachers */

$this->title = 'Create Teachers';
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-create">

    <?= $this->render('_form', [
        'model' => $model,
        'imageRepository'=>$imageRepository,
        'image_id'=>$image_id
    ]) ?>

</div>
