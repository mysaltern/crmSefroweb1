<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Videos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'videofile')->fileInput() ?>

    <?= $form->field($model, 'videoaddress')->textarea(['rows' => 6]) ?>

   <!-- <?/*= $form->field($model, 'date_created')->textInput() */?>-->
   <?php $active = ['1' => 'Yes', '0' => 'No'];
  echo   $form->field($model, 'active')->dropDownList($active, ['1' => 'Yes' , '0' => 'No']) ?>





    <?php $catname = ArrayHelper::map(common\models\CategoryWriting::find()->where(['type'=>1])->orderBy('name')->all(), 'id', 'name') ?>
    <?= $form->field($model, 'cat_id')->dropDownList($catname, ['prompt' => '---- Select Category ----'])->label('Category') ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
