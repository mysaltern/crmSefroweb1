<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ImageGallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-gallery-form">

    <?php $form = ActiveForm::begin(); ?>


    <h3>


        <?php
        $action = Yii::$app->controller->action->id;


        if ($action == 'update' and ! is_null($model->name))
        {
            ?>

            <?php
            echo Html::a(Html::encode("$model->name"), "../../../../frontend/upload/imagegallery/$model->name ", ['target' => '_blank', 'data-pjax' => "0"]);
            ?>
            <?php
        }

        ?>

    </h3>
    <?= $form->field($model, 'name')->fileInput(['multiple' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'orders')->textInput() ?>
   <?php $a = ['1' => 'فعال', '0' => 'غیرفعال']; ?>
    <?= $form->field($model, 'active')->dropDownList($a, ['1' => 'Yes']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
