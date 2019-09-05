<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'صفحه ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">


    <p>
        <?= Html::a('ایجاد صفحه', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'summary',
            'desc:html',
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
            //'photo',
            //'time:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
