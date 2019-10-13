<?php

use yii\helpers\Html;
use yii\helpers\Url;
use hoomanMirghasemi\jdf\Jdf;
use yii\web\View;

/* @var $this yii\web\View */


?>


<div class="container rtl min-height top4p">


    <h2 class="mb-4 text-center">
        مقالات
    </h2>



    <div class="row">


        <?php
        foreach ($model as $m) {

            $title = $m['title'];
            $description = $m["description"];
            $id = $m['id'];

            ?>
            <div class="col-lg-6 text-center mb-2">
                <div class="resorce-card">

                    <h3>
                          موضوع :  <?=   $title ?>
                    </h3>

                    <p>
                         توضیحات : <?= $description ?>
                    </p>

                    <br/>
                    <?php echo Html::a(Html::encode("دانلود "), "download?id=$id ", ['target' => '_blank', 'data-pjax' => "0", 'class' => 'download-btn']); ?>
                </div>

            </div>
            <?php
        }
        ?>


    </div>


</div>


