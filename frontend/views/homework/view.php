<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UniHomework */
?>
<div class="uni-homework-view" style="padding: 100px">

    <p>
        <?= Html::a(Yii::t('app', 'بازگشت'), ['index'], ['class' => 'btn btn-primary']) ?>
        <?php Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
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
          //  'id',
         //   'user_id',
          //  'lesson_id',
            [
                'attribute' => 'lesson_id',
                'value' => function ($model)
                {
                    $name = common\models\UniLesson::find()->asArray()->where(['id' => $model->lesson_id])->one();
                    return $name['name'];
                }
            ],

            'hm_file',
            'date_sent',
            'description',
        ],
    ]) ?>

</div>
