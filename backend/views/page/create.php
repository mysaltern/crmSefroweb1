<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = 'افزودن صفحه';
$this->params['breadcrumbs'][] = ['label' => 'صفحات', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
