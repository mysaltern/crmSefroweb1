<?php

use kartik\builder\TabularForm;
use kartik\grid\GridView;
use kartik\form\ActiveForm;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\helpers\Html;

$createUrl = 1;
$deleteUrl = 1;
$dataProvider = null;
$form = ActiveForm::begin();
echo TabularForm::widget([
    'form' => $form,
    'dataProvider' => $dataProvider,
    'attributes' => [
        'id' => ['type' => TabularForm::INPUT_STATIC, 'columnOptions' => ['hAlign' => GridView::ALIGN_CENTER]],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'color' => [
            'type' => TabularForm::INPUT_WIDGET,
//            'widgetClass' => \kartik\color\ColorInput::classname()
        ],
        'author_id' => [
            'type' => TabularForm::INPUT_DROPDOWN_LIST,
//            'items' => ArrayHelper::map(Ab::find()->orderBy('name')->asArray()->all(), 'id', 'name')
        ],
        'buy_amount' => [
            'type' => TabularForm::INPUT_TEXT,
            'options' => ['class' => 'form-control text-right'],
            'columnOptions' => ['hAlign' => GridView::ALIGN_RIGHT]
        ],
        'sell_amount' => [
            'type' => TabularForm::INPUT_STATIC,
            'columnOptions' => ['hAlign' => GridView::ALIGN_RIGHT]
        ],
    ],
    'gridSettings' => [
        'floatHeader' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="fas fa-book"></i> Manage Books</h3>',
            'type' => GridView::TYPE_PRIMARY,
            'after' =>
            Html::a(
                    '<i class="fas fa-plus"></i> Add New', $createUrl, ['class' => 'btn btn-success']
            ) . '&nbsp;' .
            Html::a(
                    '<i class="fas fa-times"></i> Delete', $deleteUrl, ['class' => 'btn btn-danger']
            ) . '&nbsp;' .
            Html::submitButton(
                    '<i class="fas fa-save"></i> Save', ['class' => 'btn btn-primary']
            )
        ]
    ]
]);
ActiveForm::end();
