<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UniPaper */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uni-paper-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>





    <h3>


        <?php
        $action = Yii::$app->controller->action->id;


        if ($action == 'update' and ! is_null($model->files))
        {
            ?>

            <?php
            echo Html::a(Html::encode("$model->files"), "../../../../frontend/upload/imagegallery/$model->files ", ['target' => '_blank', 'data-pjax' => "0"]);
            ?>
            <?php
        }

        ?>

    </h3>


    <?= $form->field($model, 'files')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php $a = ['1' => 'فعال', '0' => 'غیرفعال']; ?>
    <?= $form->field($model, 'active')->dropDownList($a, ['1' => 'Yes']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
