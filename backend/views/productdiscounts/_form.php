<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use faravaghi\jalaliDatePicker\jalaliDatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\InvProductDiscounts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-product-discounts-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'name')->textInput() ?>

    <?=
            $form->field(
                    $model, 'execTime'
            )
            ->widget(
                    jalaliDatePicker::className(), [
                'options' => array(
                    'format' => 'yyyy/mm/dd',
                    'viewformat' => 'yyyy/mm/dd',
                    'placement' => 'left',
                    'todayBtn' => 'linked',
                    'id' => 'date',
                    'class' => 'form-control'
                ),
    ]);
    ?>
    <?=
            $form->field(
                    $model, 'expirationTime'
            )
            ->widget(
                    jalaliDatePicker::className(), [
                'options' => array(
                    'format' => 'yyyy/mm/dd',
                    'viewformat' => 'yyyy/mm/dd',
                    'placement' => 'left',
                    'todayBtn' => 'linked',
                    'id' => 'date2',
                    'class' => 'form-control'
                ),
    ]);
    ?>

    <?php
    $item = array('0' => 'deactive', '1' => 'active');
    ?>
    <?= $form->field($model, 'active')->dropDownList($item) ?>


    <?php
    if (!Yii::$app->request->isAjax)
    {
        ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
