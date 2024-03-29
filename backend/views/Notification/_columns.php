<?php

use common\models\NotificationCategory;
use yii\helpers\ArrayHelper;
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
        'attribute'=>'note',


    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'category_id',
//    ],
    [
        'attribute' => 'category_id',
        'value' => function ($model)
        {
            $name = common\models\NotificationCategory::find()->asArray()->where(['id' => $model->category_id])->one();
            return $name['name'];
        },
          'filter' => ArrayHelper::map(\common\models\NotificationCategory::find()->all(), 'id', 'name'),
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'orders',
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