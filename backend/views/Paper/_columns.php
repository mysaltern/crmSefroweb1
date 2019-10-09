<?php

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
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'title',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'description',
    ],
   /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'files',
    ],*/
    [
        'attribute' => 'files',
        'format' => 'raw',
        'value' => function ($model)
        {
            return Html::a(Html::encode("$model->files"), "../../../../frontend/upload/paper/$model->files ", ['target' => '_blank', 'data-pjax' => "0"]);
        },
    ],
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
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   