<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\InvProductCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-product-categories-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'position')->textInput() ?>


    <?php
//    echo $form->field($model, 'imageID')->textInput()
    ?>

    <?php
    $catList = ArrayHelper::map(common\models\InvProductCategories::find()->where(['<>', 'levelno', 4])->asArray()->all(), 'id', 'name');

//    $catList = ArrayHelper::map(app\models\InvProductCategories::find()->where(['parentID' => null])->asArray()->all(), 'id', 'name');
//    array_unshift($catList, "سرشاخه");

    $catList[0] = 'سرشاخه';


    echo $form->field($model, 'parentID')->dropDownList($catList, ['id' => 'cat-id']);
//
//// Child # 1
//    echo $form->field($model, 'level2')->widget(kartik\depdrop\DepDrop::classname(), [
//        'options' => ['id' => 'subcat-id'],
//        'pluginOptions' => [
//            'depends' => ['cat-id'],
//            'placeholder' => 'Select...',
//            'url' => Url::to(['/category/level2'])
//        ]
//    ]);
//// Child # 2
//    echo $form->field($model, 'level3')->widget(kartik\depdrop\DepDrop::classname(), [
//        'pluginOptions' => [
//            'depends' => ['cat-id', 'subcat-id'],
//            'placeholder' => 'Select...',
//            'url' => Url::to(['/category/level3'])
//        ]
//    ]);
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