<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UniUniName */
?>
<div class="uni-uni-name-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
