<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InvProductSpecificationTypes */
?>
<div class="inv-product-specification-types-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'productSpecificationName',
            'productUnitID',
            'isInt',
            'isDecimal',
            'isSelection',
            'isBit',
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
