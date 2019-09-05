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
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'orderID',
//    ],
//        [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'productID',
//    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'product.name',
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'amountPrice',
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'countNumber',
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'amountDiscount',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'amoutTax',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'finalAmonutPrice',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'qtyPrize',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'paymentTimeDays',
    // ],
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
