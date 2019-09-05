<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InvProductSuppliers */
?>
<div class="inv-product-suppliers-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'code',
            'name',
            'active',
//            'deleted',
//            'createdTime',
//            'modifiedTime',
//            'createdBy',
//            'modifiedBy',
        ],
    ])
    ?>

</div>
