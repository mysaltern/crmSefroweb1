<?php

use yii\helpers\Html;
use yii\helpers\Url;
use hoomanMirghasemi\jdf\Jdf;
use yii\web\View;

/* @var $this yii\web\View */


?>


<div class="container rtl min-height top4p">


    <h2 class="mb-4 text-center">
        تکالیف
    </h2>

    <div class="text-center ">
        <?php $homework = Url::to(['homework/create']); ?>


        <a class="btn btn-light btn-xl sr-button m-4"
           href="<?= $homework; ?>">آپلود </a>

    </div>


    <div class="row">


        <?php
        foreach ($model as $m) {
            $fname = $profiles['fname'];
            $lname = $profiles["lname"];
            $major = $profiles["major"]["name"];
            $grade = $profiles["grade"]["name"];
            $uni_name = $profiles["uni"]["name"];
            $id = $m['id'];
            $date_sent = $m['date_sent'];
            $lesson = $m["lesson"]["name"];
            $enteringyear = $m["enteringyear"]["name"];
            $description = $m["description"];

            $int_date_sent = strtotime($date_sent );

            $date_display = Jdf::jdate('Y/m/d', $int_date_sent ,'','','en');

        //  $date_display = jdf::jdate('Y/F/j', $int_date_sent, '', '', '');


            ?>
            <div class="col-lg-6 text-center mb-2">
                <div class="resorce-card">
                    <h3>
                        تکالیف
                    </h3>
                    <p>
                        نام: <?= $fname ?>
                    </p>
                    <p>
                        نام خانوادگی : <?= $lname ?>
                    </p>
                    <p>
                        رشته : <?= $major ?>
                    </p>
                    <p>
                        مقطع : <?= $grade ?>
                    </p>
                    <p>
                        نام دانشگاه <?= $uni_name ?>
                    </p>
                    <p>
                        درس: <?= $lesson ?>
                    </p>

                    <p>
                        سال ورود: <?= $enteringyear ?>
                    </p>
                    <p>
                        توضیحات: <?= $description ?>
                    </p>
                    <p>

                        تاریخ آپلود: <?= $date_display ?>
                    </p>
                    <br/>
                    <?php echo Html::a(Html::encode("دانلود"), "download?id=$id ", ['target' => '_blank', 'data-pjax' => "0", 'class' => 'download-btn']); ?>
                </div>

            </div>
            <?php
        }
        ?>


    </div>


</div>


