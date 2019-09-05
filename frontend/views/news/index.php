<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<div class="margin">

    <?php
    foreach ($models as $model)
    {

        $photo = Yii::$app->urlManager->createAbsoluteUrl(['/file', 'id' => $model['photo']]);
        $summary = $model['content'];
        $summary = strip_tags("$summary");
        $summary = \Yii::$app->frontend->truncateStringWords($summary, 50);
        $url = Url::to(['news/view', 'id' => $model['id']]);
        ?>


        <div class='col-lg-6 p-4'>
            <img src="<?= $photo; ?>" />
            <p><?php echo $model['title']; ?> </p>
            <p><?php echo $summary; ?> </p>
            <a href="<?= $url; ?>">ادامه</a>
        </div>

        <?php
        // display $model here
    }
    ?>


    <?php
// display pagination
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>

</div>


<ul>


    <?php
    foreach ($category as $cat)
    {

        $url = Url::to(['news/index', 'category' => $cat['id']]);
        ?>

        <li>
            <a href="<?= $url ?>"><?= $cat['name']; ?></a>
        </li>

        <?php
    }
    ?>

</ul>