<?php


use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\InvProductDiscountDetails */

?>
<div class="inv-product-discount-details-view">

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ProductID',
            'fromCount',
            'toCount',
            'ProductDiscountID',
            'ProductPriceTypeID',
            'CustomerTypeID',
            'discount',
            'discountPercent',
            'active', [
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
//                            'deleted',
//            'createdTime',
//            'modifiedTime',
//            'createdBy',
//            'modifiedBy',
        ],
    ])

    ?>

</div>
