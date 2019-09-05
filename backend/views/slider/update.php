<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = 'ویرایش اسلایدر : ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'اسلایدر', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ویرایش';
?>
<div class="slider-update">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
