<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UniReference */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uni-reference-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>


    <?php $lesson = ArrayHelper::map(common\models\UniLesson::find()->orderBy('name')->all(), 'id', 'name') ?>

    <?= $form->field($model, 'lesson_id')->dropDownList($lesson, ['prompt' => '---- Select Grade ----'])->label('Lesson') ?>
    <?php $major = ArrayHelper::map(common\models\UniMajor::find()->orderBy('name')->all(), 'id', 'name') ?>

    <?= $form->field($model, 'major_id')->dropDownList($major, ['prompt' => '---- Select Grade ----'])->label('Major') ?>
    <h3>


        <?php
        $action = Yii::$app->controller->action->id;


        if ($action == 'update' and ! is_null($model->url))
        {
            ?>

            <?php
            echo Html::a(Html::encode("$model->url"), "../../../../frontend/upload/reference/$model->url ", ['target' => '_blank', 'data-pjax' => "0"]);
            ?>
            <?php
        }

        ?>

    </h3>
    <?= $form->field($model, 'url')->fileInput(['multiple' => true]) ?>

    <?php
    $item = array('0' => 'غیر فعال', '1' => 'فعال');
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
