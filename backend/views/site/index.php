<?php

use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */

$this->title = 'فراز اندیشان';
?>


<div class="col-lg-3 col-xs-6">

    <div class="small-box bg-green">
        <div class="inner">
            <h3><?= $commentsCount; ?><sup style="font-size: 20px"></sup></h3>
            <p>نظرات مشاهده نشده </p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">

    <div class="small-box bg-aqua">
        <div class="inner">
            <h3><?= $users; ?></h3>
            <p>کاربر ثبت نام کرده</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">

    <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?= $order; ?></h3>
            <p>فروش جدید</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">

    <div class="small-box bg-red">
        <div class="inner">
            <h3>۶۵</h3>
            <p>بازدید  </p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div>



<div class="height-control">

    <div class="row">






        <?php
        $arr = Yii::$app->mycomponent->last7Day(true);

        $sle = \common\models\SleOrders::orderWithDay();
        $visit = \common\models\Logvisitor::orderWithDay();
        ?>
        <div class="col-lg-6">
            <?=
            ChartJs::widget([
                'type' => 'line',
                'options' => [
                    'height' => 200,
                    'width' => 200
                ],
                'data' => [
                    'labels' => $arr,
                    'datasets' => [
                        [
                            'label' => "نمودار فروش",
                            'backgroundColor' => "rgba(179,181,198,0.2)",
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $sle
                        ],
                        [
                            'label' => "نمودار بازدید",
                            'backgroundColor' => "rgba(255,99,132,0.2)",
                            'borderColor' => "rgba(255,99,132,1)",
                            'pointBackgroundColor' => "rgba(255,99,132,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(255,99,132,1)",
                            'data' => $visit
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>
</div>
