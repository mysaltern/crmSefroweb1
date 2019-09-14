<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Enteringyear */
?>
<div class="enteringyear-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
