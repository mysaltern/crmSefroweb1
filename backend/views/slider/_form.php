<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>


    <?php
    $action = Yii::$app->controller->action->id;


    if ($action == 'update' and ! is_null($model->url))
    {
        ?>

        <?= Html::img(['/file', 'id' => $model->url]) ?>
        <?php
    }
    ?>
    <?= $form->field($model, 'url')->fileInput(); ?>




    <?php
    $item = array('0' => 'deactive', '1' => 'active');
    ?>
    <?= $form->field($model, 'active')->dropDownList($item) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
