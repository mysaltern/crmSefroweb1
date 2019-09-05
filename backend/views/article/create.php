<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = Yii::t('app', 'افزودن مقاله');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'مقاله'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Article-create">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
