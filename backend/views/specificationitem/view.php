<?php


use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\InvProductSpecificationSelections */

?>
<div class="inv-product-specification-selections-view">

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'selectionName',
            'productSpecificationTypeID',
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
