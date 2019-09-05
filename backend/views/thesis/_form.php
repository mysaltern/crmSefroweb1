<?php

use common\models\UniUniName;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use mludvik\tagsinput\TagsInputWidget;

/* @var $this yii\web\View */
/* @var $model common\models\UniThesis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uni-thesis-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'issue')->textInput(['maxlength' => true]) ?>

    <!-- <? /*= $form->field($model, 'url')->textInput(['maxlength' => true]) */ ?> -->


    <?= $form->field($model, 'url')->fileInput(['multiple' => true]) ?>

    <?php $user_id = Yii::$app->user->id ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['readonly' => true, 'value' => $user_id])->label(false) ?>

    <?= $form->field($model, 'date_defense')->textInput() ?>

    <?= $form->field($model, 'feild1')->textInput(['maxlength' => true]) ?>


    <?php $grade = ArrayHelper::map(common\models\UniGrade::find()->orderBy('name')->all(), 'id', 'name') ?>

    <?= $form->field($model, 'grade_id')->dropDownList($grade, ['prompt' => '---- Select Grade ----'])->label('Grade') ?>

    <?php $uni = ArrayHelper::map(common\models\UniUniName::find()->orderBy('name')->all(), 'id', 'name') ?>

    <?= $form->field($model, 'uni_id')->dropDownList($uni, ['prompt' => '---- Select University ----'])->label('University') ?>


    <?php $major = ArrayHelper::map(common\models\UniMajor::find()->orderBy('name')->all(), 'id', 'name') ?>


    <?= $form->field($model, 'major_id')->dropDownList($major, ['prompt' => '---- Select Major ----'])->label('Major') ?>
    <?= $form->field($model, 'tags')->widget(TagsInputWidget::className()) ?>
    <?php $professor = ArrayHelper::map(common\models\UniProfessor::find()->orderBy('name')->all(), 'id', 'name') ?>




    <div class="customer-form">



        <?php
        DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 10, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $model,
            'formId' => 'dynamic-form',
            'formFields' => [
                'full_name',
                'address_line1',
                'address_line2',
                'city',
                'state',
                'postal_code',
            ],
        ]);
        ?>

        <div class="container-items"><!-- widgetContainer -->

            <div class="item panel panel-default"><!-- widgetBody -->
                <div class="">

                    <div class="pull-right">
                        <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="">

                    <?= $form->field($model, 'professor[]')->dropDownList($professor, ['prompt' => '---- Select professor ----'])->label('Professor') ?>
                    <div class="row">


                    </div><!-- .row -->

                </div>
            </div>

        </div>
        <?php DynamicFormWidget::end(); ?>







    </div>



    <?php if (!Yii::$app->request->isAjax)
    {
        ?>
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

<?php ActiveForm::end(); ?>

</div>






<script>
    $(".dynamicform_wrapper").on("beforeInsert", function (e, item) {
        console.log("beforeInsert");
    });

    $(".dynamicform_wrapper").on("afterInsert", function (e, item) {
        console.log("afterInsert");
    });

    $(".dynamicform_wrapper").on("beforeDelete", function (e, item) {
        if (!confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function (e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function (e, item) {
        alert("Limit reached");
    });
</script>

