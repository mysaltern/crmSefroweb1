<?php

use yii\widgets\LinkPager;

$photo = Yii::$app->urlManager->createAbsoluteUrl(['/file', 'id' => $model['photo']]);

?>


<?php

$customcss= (new \yii\db\Query())
    ->select(['customcss'])
    ->from('page')
    ->where(['id' => $model['id']])
    ->one();


?>

<style>
    body{
    <?=  $customcss['customcss'] ?>
    }
</style>

<div class="margin">


    <img src="<?php echo $photo; ?>"/>
    <p><?php echo $model['title']; ?></p>
    <div><?php // echo $model['content'];  ?></div>
    <div><?php echo $model['desc']; ?></div>





</div>