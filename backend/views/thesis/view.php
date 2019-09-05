<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UniThesis */
?>
<div class="uni-thesis-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'issue',
            [
                'attribute' => 'url',
                'format' => 'url',
                'label' => 'دانلود',
                'value' => function ($model)
                {
                    $url = Yii::getAlias('@common/upload');


                    return $url . '/' . $model->url;
                }
            ],
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
