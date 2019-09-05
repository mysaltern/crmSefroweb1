<?php


use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\SleOrders */

?>
<div class="sle-orders-view">

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'user.username',
            'contactID',
            'contactAddressID',
            'paymenttypeID',
            'paymentDetailID',
            'trackCode',
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
