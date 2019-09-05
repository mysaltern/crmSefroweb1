<?php

use yii\helpers\Url;
use yii\bootstrap\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'user.username',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'contact.lName',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'contactAddress.address',
    ],
    [
        'header' => 'نام استان',
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'contactAddress.city.province.name',
    ],
    [
        'header' => 'نام شهر',
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'contactAddress.city.name',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'user_id',
//    ],
//        [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'contactAddressID',
//    ],
//        [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'paymenttypeID',
//    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'createdTime',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'parentID',
        'value' => function($model)
        {
            $database = (new \yii\db\Query())
                    ->select(["sle_OrderStatus.name"])
                    ->from('sle_OrderStatusHistory')
                    ->join('INNER JOIN', 'sle_OrderStatus', 'sle_OrderStatus.id=sle_OrderStatusHistory.orderStatusID')
                    ->where("orderID =$model->id")
                    ->orderBy('sle_OrderStatusHistory.id desc')
                    ->one();

            if ($database == NULL)
            {
                return 'مشاهده نشده';
            }
            else
            {
                return $database['name'];
            }
        },
    ],
//        [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'paymentDetailID',
//    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'trackCode',
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
        'template' => '{my_button}{delete}{update}{view}',
        'buttons' => [
            'my_button' => function ($url, $model, $key)
            {
                return Html::a('جزئیات سفارش<br/>', ['./orderdetail', 'id' => $model->id]);
            },
        ],
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
