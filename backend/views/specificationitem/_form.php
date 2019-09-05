<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\InvProductSpecificationSelections */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-product-specification-selections-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'selectionName')->textInput() ?>
    <?php
    $dataPost = ArrayHelper::map(\common\models\InvProductSpecificationTypes::find()->asArray()->all(), 'id', 'productSpecificationName');
    echo $form->field($model, 'productSpecificationTypeID')
            ->dropDownList(
                    $dataPost, ['id' => 'specification']
    );
    ?>




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
