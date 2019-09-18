<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VwHomework */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vw-homework-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'homeworkid')->textInput() ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'numcollegian')->textInput() ?>

    <?= $form->field($model, 'jobstatus')->textInput() ?>

    <?= $form->field($model, 'jobdetail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jobdescriotion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'profilesid')->textInput() ?>

    <?= $form->field($model, 'date_sent')->textInput() ?>

    <?= $form->field($model, 'hm_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lessonname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'majorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gradename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uniname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'term')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
