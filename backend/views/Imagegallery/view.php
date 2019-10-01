<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ImageGallery */
?>
<div class="image-gallery-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'orders',
          //  'active',
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
