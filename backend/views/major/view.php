<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UniMajor */
?>
<div class="uni-major-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
