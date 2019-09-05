<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'اخبار');
$this->params['breadcrumbs'][] = $this->title;
// the model to which are added comments, for example:
?>
<?php ?>
<div class="news-index">


    <p>
        <?= Html::a(Yii::t('app', 'اضافه کردن خبر'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
//            'content:html',
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
//            'views',
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
            //'desc:ntext',
            //'type',
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
            //'active',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
