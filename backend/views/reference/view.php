<?php

use common\models\UniLesson;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UniReference */
?>
<div class="uni-reference-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subject',

            [
                'attribute' => 'lesson_id',
                'value' => function ($model)
                {
                    $names = common\models\UniLesson::find()->asArray()->where(['id' => $model->lesson_id])->one();
              return $names['name'] ;
                }
            ],
            [
                'attribute' => 'major_id',
                'value' => function ($model)
                {
                    $names = common\models\UniMajor::find()->asArray()->where(['id' => $model->major_id])->one();
                    return $names['name'] ;
                }
            ],
          //  'major_id',
            'url',
          //  'active',
            [
                'attribute' => 'active',
                'value' => function($model)
                {
                    if ($model->active == 1)
                    {
                        return 'فعال';
                    }
                    else
                    {
                        return 'غیر فعال';
                    }
                },
            ],
        ],
    ]) ?>

</div>
