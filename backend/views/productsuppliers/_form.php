<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InvProductSuppliers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-product-suppliers-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    $item = array('0' => 'deactive', '1' => 'active');
    ?>
    <?= $form->field($model, 'active')->dropDownList($item) ?>

    <?php if (!Yii::$app->request->isAjax)
    {
        ?>
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

<?php ActiveForm::end(); ?>

</div>
