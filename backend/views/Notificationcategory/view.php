<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NotificationCategory */
?>
<div class="notification-category-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
