<?php

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
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'homeworkid',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fname',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'lname',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'gender',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'city',
//    ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'mobile',
//     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'phone',
//     ],

//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'jobstatus',
//     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'jobdetail',
//     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'jobdescriotion',
//     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'profilesid',
//     ],

//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'hm_file',
//     ],

    [
        'attribute' => 'hm_file',
        'format' => 'raw',
        'value' => function ($model)
        {
            return Html::a(Html::encode("$model->hm_file"), "../../../../frontend/upload/homework/$model->hm_file ", ['target' => '_blank', 'data-pjax' => "0"]);
        },
    ],


    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'lessonname',
        'value' => function ($model)
        {
            $name = \common\models\UniLesson::find()->select('name')->asArray()->where(['name' => $model->lessonname])->one();

            return $name['name'];
        },
       'filter' => ArrayHelper::map(\common\models\UniLesson::find()->all(), 'name', 'name'),
    ],

//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'lessonname',
//     ],


    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'majorname',
        'value' => function ($model)
        {
            $name = \common\models\UniMajor::find()->select('name')->asArray()->where(['name' => $model->majorname])->one();

            return $name['name'];
        },
        'filter' => ArrayHelper::map(\common\models\UniMajor::find()->all(), 'name', 'name'),
    ],


//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'majorname',
//     ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'gradename',
        'value' => function ($model)
        {
            $name = \common\models\UniGrade::find()->select('name')->asArray()->where(['name' => $model->gradename])->one();

            return $name['name'];
        },
        'filter' => ArrayHelper::map(\common\models\UniGrade::find()->all(), 'name', 'name'),
    ],


//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'gradename',
//     ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'uniname',
        'value' => function ($model)
        {
            $name = \common\models\UniUniName::find()->select('name')->asArray()->where(['name' => $model->uniname])->one();

            return $name['name'];
        },
        'filter' => ArrayHelper::map(\common\models\UniUniName::find()->all(), 'name', 'name'),
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'numcollegian',
    ],
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'description',
     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'username',
//     ],



    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'term',
        'value' => function ($model)
        {
            $name = \common\models\Enteringyear::find()->select('name')->asArray()->where(['name' => $model->term])->one();

            return $name['name'];
        },
        'filter' => ArrayHelper::map(\common\models\Enteringyear::find()->all(), 'name', 'name'),
    ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'term',
//     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'date_sent',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'template' => '{delete}',
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
                          'data-confirm-message'=>'آیا از حذف این تکلیف مطمئنید ؟'],
    ],

];   