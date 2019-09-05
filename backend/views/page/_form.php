<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>


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
    <?=
    FileUploadUI::widget([
        'model' => $model,
        'attribute' => 'photo',
        'url' => ['media/upload', 'id' => $model->id],
        'gallery' => false,
        'fieldOptions' => [
            'accept' => 'video/*'
        ],
        'clientOptions' => [
            'maxFileSize' => 2000000
        ],
        // ...
        'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
            'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
        ],
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
    <?php
    $dataPost = ArrayHelper::map(\common\models\CategoryWriting::find()->where(['type' => 2])->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'category_writing')
            ->dropDownList(
                    $dataPost, ['id' => 'name']
            )->label('دسته بندی');
    ?>
    <?php
    $item = array('0' => 'غیر فعال', '1' => 'فعال');
    ?>
    <?= $form->field($model, 'active')->dropDownList($item) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
