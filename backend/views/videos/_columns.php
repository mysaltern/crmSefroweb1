<?php

use common\models\CategoryWriting;
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
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'title',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'description',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'videofile',

    ],

    [
        'attribute' => 'videofile',
        'format' => 'raw',
        'value'=>function ($model) {
            return Html::a(Html::encode("$model->videofile"),"download?id=$model->id " , ['target'=>'_blank', 'data-pjax'=>"0"]);
        },

    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'videoaddress',
        'format' => 'raw',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'date_created',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'active',
    // ],
    /*    [
            'class'=>'\kartik\grid\DataColumn',
           'attribute'=>'cat_id',
        ],*/

    [
        'attribute' => 'cat_id',
        'value' => function ($model) {
            $CategoryWriting = common\models\CategoryWriting::find()->asArray()->where(['id' => $model->cat_id])->one();
            return $CategoryWriting['name'];
        },
        'filter' => ArrayHelper::map(CategoryWriting::find()->where(['type' => 1])->all(), 'id', 'name'),
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],

];   