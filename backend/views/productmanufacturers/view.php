<?php


use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\InvProductManufacturers */

?>
<div class="inv-product-manufacturers-view">

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
//            'code',
            'name',
        ],
    ])

    ?>

</div>
