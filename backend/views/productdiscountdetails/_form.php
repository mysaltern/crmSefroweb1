<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\InvProductDiscountDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-product-discount-details-form">

    <?php $form = ActiveForm::begin(); ?>



    <?php
    $dataPost = ArrayHelper::map(\common\models\InvProducts::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'ProductID')
            ->dropDownList(
                    $dataPost, ['id' => 'ProductID']
    );
    ?>
    <?= $form->field($model, 'fromCount')->textInput() ?>

    <?= $form->field($model, 'toCount')->textInput() ?>


    <?php
    $dataPost = ArrayHelper::map(\common\models\InvProductDiscounts::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'ProductDiscountID')
            ->dropDownList(
                    $dataPost, ['id' => 'ProductDiscountID']
    );
    ?>
    <?php
    $dataPost = ArrayHelper::map(\common\models\InvProductPriceTypes::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'ProductPriceTypeID')
            ->dropDownList(
                    $dataPost, ['id' => 'ProductPriceTypeID']
    );
    ?>

    <?php
    $dataPost = ArrayHelper::map(\common\models\CrmContactTypes::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'CustomerTypeID')
            ->dropDownList(
                    $dataPost, ['id' => 'CustomerTypeID']
    );
    ?>


    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'discountPercent')->textInput() ?>



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
