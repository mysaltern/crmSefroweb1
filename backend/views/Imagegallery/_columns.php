<?php

use common\models\NotificationCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
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
  /*  [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],*/
    [
        'attribute' => 'name',
        'format' => 'raw',
        'value' => function ($model)
        {
            return Html::a(Html::encode("$model->name"), "../../../../frontend/upload/imagegallery/$model->name ", ['target' => '_blank', 'data-pjax' => "0"]);
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'description',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'orders',
    ],
  /*  [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'active',
    ],*/

    [
        'attribute' => 'active',
        'value' => function ($model)
        {
            if ($model->active == 1)
            {
                return 'فعال';
            }
            if ($model->active == 0)
            {
                return 'غیرفعال';
            }

        },
        'filter' => array("1" => "فعال", "0" => "غیرفعال"),
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'آیا مطمئنید ؟',
                          'data-confirm-message'=>'آیا از حذف این تصاویر مطمئن هستید ؟'],
    ],

];   