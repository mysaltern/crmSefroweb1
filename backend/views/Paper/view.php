<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UniPaper */
?>
<div class="uni-paper-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description',
            'files',
         //   'active',
            [
                'attribute' => 'active',
                'value' => function ($model)
                {
                    if ($model->active == 1)
                    {
                        return 'فعال';
                    }
                    if ($model->active == 0)
                    {
                        return 'غیرفعال';
                    }

                },

            ],
        ],
    ]) ?>

</div>
