<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Videos */
?>
<div class="videos-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:ntext',
            'description:ntext',
            'videofile:ntext',
            'videoaddress:ntext',
            'date_created',
            'active',
         //   'cat_id',
            [
                'attribute' => 'cat_id',
                'value' => function ($model)
                {
                    $CategoryWriting = common\models\CategoryWriting::find()->asArray()->where(['id' => $model->cat_id , 'type' => 1])->one();
                    return $CategoryWriting['name'];
                }
                //  'visible' => \Yii::$app->user->can('posts.owner.view'),
            ],
        ],
    ]) ?>

</div>
