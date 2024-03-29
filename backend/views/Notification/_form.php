<?php

use common\models\UniGrade;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>


    <?php $category_id = ArrayHelper::map(common\models\NotificationCategory::find()->orderBy('name')->all(), 'id', 'name') ?>

    <?= $form->field($model, 'category_id')->dropDownList($category_id, ['prompt' => '---- Select Category ----'])?>

    <?= $form->field($model, 'orders')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
