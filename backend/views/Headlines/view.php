<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Headlines */
?>
<div class="headlines-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'lesson_id',
        ],
    ]) ?>

</div>
