<?php


use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\InvProducts */

?>
<div class="inv-products-view">

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'name',
            'invProductManufacturer.name',
            'invProductSupplier.name',
            'invProductSharedCodeID',
            'invProductType.name',
            'invProductShape.name',
            'invProductCategory.name',
            'summary',
            'description:ntext',
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
