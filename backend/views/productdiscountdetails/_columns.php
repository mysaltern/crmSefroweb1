<?php


use yii\helpers\Url;


return [
        [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
        [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'نام محصول',
        'value' => 'product.name',
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'نام تخفیف',
        'value' => 'productDiscount.name',
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'نوع قیمت',
        'value' => 'productPriceType.name',
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'نوع مشتری',
        'value' => 'customerType.name',
    ],
//        [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'ProductID',
//    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fromCount',
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'toCount',
    ],
//        [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'ProductDiscountID',
//    ],
//        [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'ProductPriceTypeID',
//    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'CustomerTypeID',
//    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'discount',
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'discountPercent',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'active',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'deleted',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'createdTime',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'modifiedTime',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'createdBy',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'modifiedBy',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function($action, $model, $key, $index)
            {
            return Url::to([$action, 'id' => $key]);
            },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],
];
