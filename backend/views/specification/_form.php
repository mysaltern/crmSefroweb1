<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvProductSpecificationTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-product-specification-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productSpecificationName')->textInput() ?>



    <?php
    $dataPost = yii\helpers\ArrayHelper::map(\common\models\InvProducts::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'productUnitID')
            ->dropDownList(
                    $dataPost, ['id' => 'productUnitID']
    );
    ?>


    <?php // echo $form->field($model, 'isInt')->textInput() ?>

    <?php // echo $form->field($model, 'isDecimal')->textInput() ?>

    <?php // echo $form->field($model, 'isSelection')->textInput() ?>

    <?php // echo $form->field($model, 'isBit')->textInput() ?>




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
