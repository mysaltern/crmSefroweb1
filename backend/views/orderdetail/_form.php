<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\SleOrderDetail */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sle-order-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderID')->textInput() ?>

    <?= $form->field($model, 'productID')->textInput() ?>

    <?= $form->field($model, 'amountPrice')->textInput() ?>

    <?= $form->field($model, 'countNumber')->textInput() ?>

    <?= $form->field($model, 'amountDiscount')->textInput() ?>

    <?= $form->field($model, 'amoutTax')->textInput() ?>

    <?= $form->field($model, 'finalAmonutPrice')->textInput() ?>

<?= $form->field($model, 'qtyPrize')->textInput() ?>

    <?= $form->field($model, 'paymentTimeDays')->textInput() ?>




    <?php if (!Yii::$app->request->isAjax)
        { ?>
        <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
<?php } ?>

<?php ActiveForm::end(); ?>

</div>
