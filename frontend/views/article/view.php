<?php

use yii\widgets\LinkPager;

$photo = Yii::$app->urlManager->createAbsoluteUrl(['/file', 'id' => $model['photo']]);
?>

<div class="margin">


    <img src="<?php echo $photo; ?>"/>
    <p><?php echo $model['title']; ?></p>
    <div><?php echo $model['content']; ?></div>
    <div><?php echo $model['desc']; ?></div>




</div>