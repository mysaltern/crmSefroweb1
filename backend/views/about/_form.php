<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\About */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tell')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tell2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true, 'id' => 'us2-lat']) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => true, 'id' => 'us2-lon']) ?>


    <?php
    if (isset($model->lat))
    {
        $lat = $model->lat;
    }
    else
    {

        $lat = 35.74593135576459;
    }
    if (isset($model->lng))
    {
        $lng = $model->lng;
    }
    else
    {

        $lng = 51.37545183563236;
    }
    ?>


    <?php
    echo \pigolab\locationpicker\LocationPickerWidget::widget([
        'key' => 'AIzaSyBgBlJ38S8xCrmi4iWfIIbKjfqpI14VWS0', // require , Put your google map api key
        'options' => [
            'style' => 'width: 100%; height: 400px', // map canvas width and height
        ],
        'clientOptions' => [
            'location' => [
                'latitude' => $lat,
                'longitude' => $lng,
            ],
            'radius' => 300,
            'addressFormat' => 'street_number',
            'inputBinding' => [
                'latitudeInput' => new JsExpression("$('#us2-lat')"),
                'longitudeInput' => new JsExpression("$('#us2-lon')"),
//            'radiusInput' => new JsExpression("$('#us2-radius')"),
//            'locationNameInput' => new JsExpression("$('#us2-address')")
            ]
        ]
    ]);
    ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>ذخیره شد</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
