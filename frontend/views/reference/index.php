<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */


?>


<div class="container rtl min-height top4p">


    <h2 class="mb-4 text-center">
        منابع درسی
    </h2>

    <div class="row">
        <?php
        foreach ($model as $m) {
            $url = $m['url'];
            $id = $m['id'];

            if ($m["active"] == 1) {
                ?>

                <div class="col-lg-6 text-center mb-2">
                    <div class="resorce-card">
                        <h3>
                            <?php echo $subject = $m['subject']; ?>
                        </h3>
                        <p>
                            <?php echo $major = $m['major']['name']; ?> - <?php echo $lesson = $m['lesson']['name']; ?>
                        </p>
                        <br/>
                        <?php echo Html::a(Html::encode("دانلود"), "download?id=$id ", ['target' => '_blank', 'data-pjax' => "0", 'class' => 'download-btn']); ?>
                    </div>

                </div>

                <?php
            }
        }

        ?>
    </div>
</div>