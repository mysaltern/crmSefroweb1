<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = Yii::t('app', 'ویرایش خبر : {name}', [
            'name' => $model->title,
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'اخبار'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="news-update">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
