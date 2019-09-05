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
        'attribute' => 'issue',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'url',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'major.name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'uni.name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'grade.name',
    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'user_id',
//    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'date_defense',
//    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'feild1',
//    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'grade_id',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'uni_id',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'major_id',
    // ],
    [
        'attribute' => 'Professor',
        'label' => 'نام استاد ',
        'value' => function ($model)
        {
            $names = \common\models\UniThesisProfessor::find()->asArray()->where(['thesis_id' => $model->id])->all();
            $txt = '';
            $x = 0;
            foreach ($names as $name)
            {
                $x++;
                $ide = $name["professor_id"];


                $prName = \common\models\UniProfessor::find()->asArray()->where(['id' => $ide])->one();
                if ($x == 1)
                {
                    $txt .= $prName['name'];
                }
                else
                {
                    $txt .= "," . $prName['name'];
                }
            }
            return $txt;
        }
    ],
    [
        'attribute' => 'Tags',
        'label' => 'کلمات کلیدی',
        'value' => function ($model)
        {
            $names = \common\models\Tag::find()->asArray()->where(['record_id' => $model->id, 'table' => 'thesis'])->all();
            $txt = '';
            $x = 0;
            foreach ($names as $name)
            {
                $x++;


                if ($x == 1)
                {
                    $txt .= $name['name'];
                }
                else
                {
                    $txt .= "," . $name['name'];
                }
            }
            return $txt;
        }
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index)
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
