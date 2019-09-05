<?php


use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\InvProductDiscounts */

?>
<div class="inv-product-discounts-view">

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'name',
            'execTime',
            'expirationTime',
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
//            'active',
//            'deleted',
//            'createdTime',
//            'modifiedTime',
//            'createdBy',
//            'modifiedBy',
        ],
    ])

    ?>

</div>
