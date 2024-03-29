<?php

use yii\helpers\Url;
use yii\helpers\Html;

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
        'attribute' => 'subject',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'lesson.name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'major.name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'headlines.name',
    ],
    [
        'attribute' => 'url',
        'format' => 'raw',
        'value' => function ($model)
        {
            return Html::a(Html::encode("$model->url"), "../../../../frontend/upload/reference/$model->url ", ['target' => '_blank', 'data-pjax' => "0"]);
        },
    ],
    [
        'attribute' => 'active',
        'value' => function($model)
        {
            if ($model->active == 1)
            {
                return 'فعال';
            }
            else
            {
                return 'غیر فعال';
            }
        },
    ],
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
