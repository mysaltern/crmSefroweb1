<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VwHomework */
?>
<div class="vw-homework-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'homeworkid',
            'fname',
            'lname',
            'gender',
            'city',
            'mobile',
            'phone',
            'numcollegian',
            'jobstatus',
            'jobdetail',
            'jobdescriotion:ntext',
            'profilesid',
            'date_sent',
            'hm_file',
            'lessonname',
            'majorname',
            'gradename',
            'uniname',
            'username',
            'term',
        ],
    ]) ?>

</div>
