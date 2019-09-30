<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Notification */
?>
<div class="notification-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'note:ntext',
        //    'category_id',


            [
                'attribute' => 'category_id',
                'value' => function ($model)
                {
                    $name = common\models\NotificationCategory::find()->asArray()->where(['id' => $model->category_id])->one();
                    return $name['name'];
                }

            ],
//

            'orders',
        ],
    ]) ?>

</div>
