<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryWriting */
?>
<div class="category-writing-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'type',
        ],
    ]) ?>

</div>
