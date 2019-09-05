<?php


use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\SleOrderDetail */

?>
<div class="sle-order-detail-view">

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'orderID',
            'productID',
            'amountPrice',
            'countNumber',
            'amountDiscount',
            'amoutTax',
            'finalAmonutPrice',
            'qtyPrize',
            'paymentTimeDays:datetime',
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
