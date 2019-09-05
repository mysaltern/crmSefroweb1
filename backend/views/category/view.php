<?php


use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\InvProductCategories */

?>
<div class="inv-product-categories-view">

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'name',
            'parentID',
            'levelno',
            'position',
//            'imageID',
            [
                'attribute' => 'active',
                'value' => function ($data)
                    {

                    if ($data->active == 1)
                        {
                        return 'فعال';
                        }
                    else
                        {
                        return 'غیر فعال';
                        }
                    },
            ],
//            'deleted',
//            'createdTime',
//            'modifiedTime',
//            'createdBy',
//            'modifiedBy',
        ],
    ])

    ?>

</div>
