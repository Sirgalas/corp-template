<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\forms\teachers\EditForm
 *@var  $teacher app\entities\Teachers;
 */

$this->title = 'Редактировать учителя: ' . $teacher->name;
$this->params['breadcrumbs'][] = ['label' => 'Учителя', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $teacher->name, 'url' => ['view', 'id' => $teacher->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="teachers-update">

    <?= $this->render('_form', [
        'model'=>$model,
        'imageRepository'=>$imageRepository,
        'image_id'=>$image_id,
        'imageForm'=>$imageForm,
    ]) ?>

</div>
