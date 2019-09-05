<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\About */

$this->title = Yii::t('app', 'ویرایش تماس با ما', [
            'name' => '',
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'تماس با ما'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'ویرایش');
?>
<div class="about-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
