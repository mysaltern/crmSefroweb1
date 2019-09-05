<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'اسلایدر', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">


    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
            'title',
            'desc',
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
            'order',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function ($data)
                {
                    if (!empty($data->url))
                    {
                        $url = Yii::$app->urlManager->createAbsoluteUrl(['/file']);

                        return Html::img($url . '?id=' . $data['url'], ['width' => '70px']);
                    }
                },
            ],
        ],
    ])
    ?>

</div>
