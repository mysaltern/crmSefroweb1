<?php

use common\models\UniGrade;
use common\models\UniLesson;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UniHomework */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uni-homework-form" style="padding: 100px">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>




    <?php $user_id = Yii::$app->user->id ?>
    <?= $form->field($model, 'user_id')->hiddenInput(['readonly' => true, 'value' => $user_id])->label(false) ?>


    <?php $lesson = ArrayHelper::map(common\models\UniLesson::find()->orderBy('name')->all(), 'id', 'name') ?>
    <?= $form->field($model, 'lesson_id')->dropDownList($lesson, ['prompt' => '---- انتخاب درس ----']) ?>



    <?php $enteringyear = ArrayHelper::map(common\models\Enteringyear::find()->orderBy('id')->all(), 'id', 'name') ?>
    <?= $form->field($model, 'enteringyear_id')->dropDownList($enteringyear, ['prompt' => '---- انتخاب ترم ----']) ?>

    <?= $form->field($model, 'hm_file')->fileInput(['multiple' => true]) ?>

    <?php $form->field($model, 'date_sent')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ارسال') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
