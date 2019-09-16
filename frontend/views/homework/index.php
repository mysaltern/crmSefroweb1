<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */


?>


<div class="container rtl min-height top4p">


    <h2 class="mb-4 text-center">
        تکالیف
    </h2>

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
                        تاریخ آپلود: <?= $date_sent ?>
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


<?php   $homework = Url::to(['homework/create']); ?>


<a class="btn btn-light btn-xl sr-button"
   href="<?=  $homework; ?>">آپلود </a>
