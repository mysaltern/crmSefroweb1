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

                <div class="form-check mb-3 mt-4">
                    <input type="checkbox" class="form-check-input" id="notstudent">
                    <label class="form-check-label pr-4" for="notstudent">دانشجو نیستم</label>
                </div>

                <?= $form->field($model, 'fname') ?>
                <?= $form->field($model, 'lname') ?>
                <?= $form->field($model, 'username')->label('کد ملی') ->textinput(['onchange' => 'count();']) ?>


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

                <?php $enteringyear = ArrayHelper::map(\common\models\Enteringyear::find()->orderBy('id DESC')->all(), 'id', 'name') ?>
                <?= $form->field($model, 'enteringyear_id')->dropDownList($enteringyear, ['prompt' => '---- انتخاب سال ورود ----']); ?>

                <?= $form->field($model, 'numcollegian') ?>

                <div>
                    <?php $jobstatus = [ '1' => 'شاغل', '0' => 'بدون شغل']; ?>
                    <?= $form->field($model, 'jobstatus')->dropDownList($jobstatus ,  ['prompt' => '---- وضعیت شغلی ----']) ?>
                </div>
                <div>
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


<script>
    $(document).ready(function () {
        $(".field-register-form-jobdetail").hide();
        $("#register-form-jobstatus").change(function () {
            if ($(this).val() === "1") {
                $(".field-register-form-jobdetail").show();

            } else if ($(this).val() === "0") {
                $(".field-register-form-jobdetail").hide();

            }

        });


        $("#notstudent").click(function () {
            if ($(this).is(":checked")) {
                $(".field-register-form-uni_id").hide();
                $(".field-register-form-major_id").hide();
                $(".field-register-form-grade_id").hide();
                $(".field-register-form-enteringyear_id").hide();
                $(".field-register-form-numcollegian").hide();
            } else {
                $(".field-register-form-uni_id").show();
                $(".field-register-form-major_id").show();
                $(".field-register-form-grade_id").show();
                $(".field-register-form-enteringyear_id").show();
                $(".field-register-form-numcollegian").show();
            }
        });

    });
</script>