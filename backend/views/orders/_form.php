<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\SleOrders */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sle-orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'contactID')->textInput() ?>

    <?= $form->field($model, 'contactAddressID')->textInput() ?>

    <?= $form->field($model, 'paymenttypeID')->textInput() ?>

    <?= $form->field($model, 'paymentDetailID')->textInput() ?>

        <?= $form->field($model, 'trackCode')->textInput() ?>


    <?php if (!Yii::$app->request->isAjax)
        { ?>
        <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
<?php } ?>

<?php ActiveForm::end(); ?>

</div>
