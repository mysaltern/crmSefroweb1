<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\InvProductShapes */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="inv-product-shapes-form">

<?php $form = ActiveForm::begin(); ?>


<?= $form->field($model, 'name')->textInput() ?>






    <?php if (!Yii::$app->request->isAjax)
        { ?>
        <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
<?php } ?>

<?php ActiveForm::end(); ?>

</div>
