<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */
$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>

<!--<style>-->
<!--    .select2 {-->
<!--        display: none;-->
<!--    }-->
<!--</style>-->

<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 center-block">
        <div class="panel panel-default">
            <!-- display error message -->
            <?php if (Yii::$app->session->hasFlash('faild')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Saved!</h4>
                    <?= Yii::$app->session->getFlash('faild') ?>
                </div>
            <?php endif; ?>
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'registration-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]);
                ?>


                <?= $form->field($model, 'fname') ?>
                <?= $form->field($model, 'lname') ?>
                <?= $form->field($model, 'username')->label('کد ملی') ?>


                <?php $gender = ['1' => 'مرد', '0' => 'زن']; ?>
                <?= $form->field($model, 'gender')->dropDownList($gender ,  ['prompt' => '---- جنسیت ----']) ?>

                <?php $form->field($model, 'datebrith') ?>



                <?php $form->field($model, 'datebrith')->widget(\yii\jui\DatePicker::className(),
                    ['dateFormat' => 'php:m/d/Y',
                        'clientOptions' => [
                            'changeYear' => true,
                            'changeMonth' => true,
                            'yearRange' => '-50:-12',
                            'altFormat' => 'yy-mm-dd',
                        ]], ['placeholder' => 'ماه/روز/سال'])
                    ->textInput(['placeholder' => \Yii::t('app', '1360/01/01')]); ?>





                <?php $glb_province = ArrayHelper::map(\common\models\GlbProvince::find()->orderBy('name')->all(), 'id', 'name') ?>
                <?= $form->field($model, 'province_id')->dropDownList($glb_province, ['prompt' => '---- انتخاب استان ----']); ?>



                <?= $form->field($model, 'city') ?>
                <?= $form->field($model, 'mobile') ?>
                <?= $form->field($model, 'phone') ?>
                <?= $form->field($model, 'email') ?>

                <?php $uniname = ArrayHelper::map(\common\models\UniUniName::find()->orderBy('name')->all(), 'id', 'name') ?>
                <?= $form->field($model, 'uni_id')->dropDownList($uniname, ['prompt' => '---- انتخاب دانشگاه ----']); ?>


                <?php $major = ArrayHelper::map(\common\models\UniMajor::find()->orderBy('name')->all(), 'id', 'name') ?>
                <?= $form->field($model, 'major_id')->dropDownList($major, ['prompt' => '---- انتخاب رشته ی تحصیلی ----']); ?>

                <?php $unigrade = ArrayHelper::map(\common\models\UniGrade::find()->orderBy('name')->all(), 'id', 'name') ?>
                <?= $form->field($model, 'grade_id')->dropDownList($unigrade, ['prompt' => '---- انتخاب مقطع ----']); ?>

                <?php $enteringyear = ArrayHelper::map(\common\models\Enteringyear::find()->all(), 'id', 'name') ?>
                <?= $form->field($model, 'enteringyear_id')->dropDownList($enteringyear, ['prompt' => '---- انتخاب سال ورود ----']); ?>

                <?= $form->field($model, 'numcollegian') ?>

                <div class="select1">
                <?php $jobstatus = [ '1' => 'شاغل', '0' => 'بدون شغل']; ?>
                <?= $form->field($model, 'jobstatus')->dropDownList($jobstatus ,  ['prompt' => '---- وضعیت شغلی ----']) ?>
                </div>
                <div class="select2">
                    <?= $form->field($model, 'jobdetail')->textInput() ?>
                </div>


                <?= $form->field($model, 'jobdescription')->textarea(); ?>


                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                <?php endif ?>


                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
    </div>
</div>


<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $(".select1").change(function () {-->
<!--            console.log($(this).val());-->
<!--            if ($(this).val() == "شاغل") {-->
<!---->
<!--                $(".select2").show();-->
<!---->
<!--            } else if ($(this).val() === "0") {-->
<!--                $(".select2").hide();-->
<!---->
<!--            }-->
<!---->
<!--        });-->
<!--    });-->
<!--</script>-->
