<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Videos */
?>
<div class="videos-view">


    <p>
        <?= Html::a(Yii::t('app', 'بازگشت'), ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>
 
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
