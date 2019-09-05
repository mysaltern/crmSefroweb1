<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use faravaghi\jalaliDatePicker\jalaliDatePicker;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="Article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <?=
    $form->field($model, 'content')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'fa',
        'clientOptions' => [
//            'theme' => 'modern',
//            'skin' => 'lightgray-gradient', //charcoal, tundora, lightgray-gradient, lightgray
            'image_advtab' => true,
            'plugins' => [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable",
            ],
            'toolbar1' => "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            'toolbar2' => "print preview media | forecolor backcolor emoticons | codesample",
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);
    ?>


    <?=
    $form->field($model, 'desc')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'fa',
        'clientOptions' => [
//            'theme' => 'modern',
//            'skin' => 'lightgray-gradient', //charcoal, tundora, lightgray-gradient, lightgray
            'image_advtab' => true,
            'plugins' => [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable",
            ],
            'toolbar1' => "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            'toolbar2' => "print preview media | forecolor backcolor emoticons | codesample",
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);
    ?>

    <?php
    $action = Yii::$app->controller->action->id;


    if ($action == 'update' and ! is_null($model->photo))
    {
        ?>

        <?= Html::img(['/file', 'id' => $model->photo]) ?>
        <?php
    }
    ?>
    <?= $form->field($model, 'photo')->fileInput(); ?>



    <?php
    echo $form->field(
                    $model, 'publish_date_'
            )
            ->widget(
                    jalaliDatePicker::className(), [
                'options' => array(
                    'format' => 'yyyy/mm/dd',
                    'viewformat' => 'yyyy/mm/dd',
                    'placement' => 'left',
                    'todayBtn' => 'linked',
                ),
//                'htmlOptions' => [
//                    'id' => 'publish_date_',
//                    'class' => 'form-control'
//                ]
            ])->label('تاریخ انتشار');
    ?>
    <?php
    $item = array('0' => 'غیر فعال', '1' => 'فعال');
    ?>
    <?php
    $dataPost = ArrayHelper::map(\common\models\CategoryWriting::find()->where(['type' => 2])->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'category_id')
            ->dropDownList(
                    $dataPost, ['id' => 'name']
            )->label('دسته بندی');
    ?>
    <?= $form->field($model, 'active')->dropDownList($item) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
