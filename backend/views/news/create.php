<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = Yii::t('app', 'افزودن خبر');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'اخبار'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
