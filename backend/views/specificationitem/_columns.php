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
        'attribute' => 'selectionName',
    ],
//        [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'productSpecificationTypeID',
//    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'productSpecificationType.productSpecificationName',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'active',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'deleted',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'createdTime',
//    ],
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
            'data-confirm-title' => 'آیا مطمئن هستید ؟',
            'data-confirm-message' => 'آیا از حذف این مورد مطمئن هستید ؟'],
    ],
];
