<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UniThesis */
?>

<div class="uni-thesis-view" style="padding: 150px">


        <p>
            <?= Html::a(Yii::t('app', 'بازگشت'), ['index'], ['class' => 'btn btn-primary']) ?>
            <?php Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php
            Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </p>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'issue',
      /*      [
                'attribute' => 'url',
                'format' => 'url',
                'label' => 'دانلود',
                'value' => function ($model)
                {
                    $url = Yii::getAlias('@frontend/upload/thesis/');


                    return $url . '/' . $model->url;
                }
            ],*/
            [
                'attribute' => 'Professor',
                'label' => 'نام استاد',
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
            'date_defense',
//            'feild1',
            'grade.name',
            'uni.name',
            'major.name',
        ],
    ])
    ?>

</div>
