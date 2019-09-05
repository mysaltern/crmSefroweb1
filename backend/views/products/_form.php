<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\InvProducts */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/SA.css");
if (!isset($path))
{
    $path = '';
}
?>

<div class="inv-products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


    <?= $form->field($model, 'name')->textInput() ?>


    <?php
    $dataPost = ArrayHelper::map(\common\models\InvProductManufacturers::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'invProductManufacturerID')
            ->dropDownList(
                    $dataPost, ['id' => 'proManufactor']
    );
    ?>
    <?php
    $dataPost = ArrayHelper::map(\common\models\InvProductSuppliers::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'invProductSupplierID')
            ->dropDownList(
                    $dataPost, ['id' => 'proSupplier']
    );
    ?>



    <?php
//    $dataPost = ArrayHelper::map(\common\models\InvProductSharedCodes::find()->asArray()->all(), 'id', 'name');
//    echo $form->field($model, 'invProductSharedCodeID')
//            ->dropDownList(
//                    $dataPost, ['id' => 'proShared']
//    );
    ?>
    <?php
    $dataPost = ArrayHelper::map(\common\models\InvProductTypes::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'invProductTypeID')
            ->dropDownList(
                    $dataPost, ['id' => 'proType']
    );
    ?>
    <?php
    $dataPost = ArrayHelper::map(\common\models\InvProductShapes::find()->asArray()->all(), 'id', 'name');
    echo $form->field($model, 'invProductShapeID')
            ->dropDownList(
                    $dataPost, ['id' => 'proShape']
    );
    ?>
    <?php
    $cat_master = new \common\models\InvProductCategories;
    $cat_not = $cat_master->getLastLevel();


    $a = array();

    foreach ($cat_not as $c)
    {

        $parent = $c['parentID'];



        $a[$c['id']] = $c['name'];
    }


    echo $form->field($model, 'invProductCategoryID')
            ->dropDownList(
                    $a, ['id' => 'proCat']
    );
    ?>



    <?= $form->field($model, 'summary')->textInput() ?>
    <?= $form->field($model, 'description')->textarea() ?>

    <?php
//    echo
//    $form->field($model, 'description')->widget(TinyMce::className(), [
//        'options' => ['rows' => 6],
//        'language' => 'fa',
//        'clientOptions' => [
////            'theme' => 'modern',
////            'skin' => 'lightgray-gradient', //charcoal, tundora, lightgray-gradient, lightgray
//            'image_advtab' => true,
//            'plugins' => [
//                "advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder",
//                "searchreplace wordcount visualblocks visualchars code fullscreen",
//                "insertdatetime media nonbreaking save table contextmenu directionality",
//                "emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable",
//            ],
//            'toolbar1' => "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
//            'toolbar2' => "print preview media | forecolor backcolor emoticons | codesample",
//            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
//        ]
//    ]);
    ?>
    <?php
    if (isset($model->active))
    {
        $active = $model->active;
    }
    else
    {
        $active = '';
    }

    if (isset($model->name))
    {

    }
    else
    {
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
        <?= $form->field($model, 'file')->fileInput(); ?>


        <?php
    }
    ?>
    <?php
    echo $form->field($model, 'active')->dropDownList(['0' => 'غیر فعال', '1' => ' فعال'], ['options' =>
        [
            $active => ['selected ' => true]
        ]]
            , ['prompt' => 'انتخاب']);
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
