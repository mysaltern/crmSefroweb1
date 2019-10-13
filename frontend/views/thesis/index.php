<?php

use yii\helpers\Html;
use yii\helpers\Url;
use hoomanMirghasemi\jdf\Jdf;
use yii\web\View;

/* @var $this yii\web\View */


?>


<div class="container rtl min-height top4p">


    <h2 class="mb-4 text-center">
        پایان نامه
    </h2>

    <div class="text-center ">
        <?php $thesis = Url::to(['thesis/create']); ?>


        <a class="btn btn-light btn-xl sr-button m-4"
           href="<?= $thesis; ?>">آپلود </a>

    </div>


    <div class="row">


        <?php
        foreach ($model as $m) {

            $issue = $m['issue'];
            $url = $m["url"];
            $major = $m["major"]["name"];
            $grade = $m["grade"]["name"];
            $uni_name = $m["uni"]["name"];
            $id = $m['id'];
            $date_defense = $m['date_defense'];

         //   $int_date_sent = strtotime($date_defense );

       //     $date_display = Jdf::jdate('Y/m/d', $int_date_sent ,'','','en');

            //  $date_display = jdf::jdate('Y/F/j', $int_date_sent, '', '', '');


            ?>
            <div class="col-lg-6 text-center mb-2">
                <div class="resorce-card">
                    <h3>
                        پایان نامه
                    </h3>
                    <p>
                        موضوع :<?=  $issue ?>
                    </p>

                    <p>
                        رشته : <?= $major ?>
                    </p>
                    <p>
                        مقطع : <?= $grade ?>
                    </p>
                    <p>
                        نام دانشگاه :<?= $uni_name ?>
                    </p>

                    <p>

                        تاریخ دفاع: <?=   $date_defense ?>
                    </p>
                    <br/>
                    <?php echo Html::a(Html::encode("دانلود POWERPOINT"), "download?id=$id ", ['target' => '_blank', 'data-pjax' => "0", 'class' => 'download-btn']); ?>
                    <?php echo Html::a(Html::encode("دانلود PDF"), "pdf?id=$id ", ['target' => '_blank', 'data-pjax' => "0", 'class' => 'download-btn']); ?>
                    <?php echo Html::a(Html::encode("دانلود WORD"), "word?id=$id ", ['target' => '_blank', 'data-pjax' => "0", 'class' => 'download-btn']); ?>
                </div>

            </div>
            <?php
        }
        ?>


    </div>


</div>


