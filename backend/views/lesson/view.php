<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UniLesson */
?>
<div class="uni-lesson-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
