<?php


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InvProducts */

?>
<div class="inv-products-update">

    <?=

    $this->render('_form', [
        'model' => $model,
        'path' => $path
    ])

    ?>

</div>
