<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'اخبار'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">


    <p>
        <?= Html::a(Yii::t('app', 'بازگشت'), ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
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
            'title',
            'content:html',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function ($data)
                {
                    if (!empty($data->photo))
                    {
                        $url = Yii::$app->urlManager->createAbsoluteUrl(['/file']);

                        return Html::img($url . '?id=' . $data['photo'], ['width' => '70px']);
                    }
                },
            ],
            [
                'attribute' => 'date',
                'value' => function($model)
                {
                    if ($model->date != null)
                    {
                        return \Yii::$app->jdf->jdate($format = 'Y/F/j', $timestamp = $model->date, $none = '', $time_zone = 'Asia/Tehran', $tr_num = 'fa');
                    }
                },
            ],
            [
                'attribute' => 'date_update',
                'value' => function($model)
                {
                    if ($model->date_update != null)
                    {
                        return \Yii::$app->jdf->jdate($format = 'Y/F/j', $timestamp = $model->date_update, $none = '', $time_zone = 'Asia/Tehran', $tr_num = 'fa');
                    }
                },
            ],
            'category.name',
            'desc:html',
            [
                'attribute' => 'publish_date',
                'value' => function($model)
                {
                    if ($model->publish_date != null)
                    {
                        return \Yii::$app->jdf->jdate($format = 'Y/F/j', $timestamp = $model->publish_date, $none = '', $time_zone = 'Asia/Tehran', $tr_num = 'fa');
                    }
                },
            ],
            [
                'attribute' => 'active',
                'value' => function($model)
                {
                    if ($model->active == 1)
                    {
                        return 'active';
                    }
                    else
                    {
                        return 'deactive';
                    }
                },
            ],
        ],
    ])
    ?>

</div>
