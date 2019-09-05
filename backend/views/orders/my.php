<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;


$imgBase = Yii::$app->mycomponent->imgURL();
$base = Yii::$app->urlManager->baseUrl;
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $model
 */

?>
<?php \app\models\InvProductBaskets::getBasketList(); ?>
<div class="row">

    <div class="col-md-12 rtl">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">سفارش ها من</h3>
            </div>
            <div class="panel-body my-order">
                <div class="row rtl">
                    <div class="order-item-header row col-xs-12">
                        <div class="col-sm-3 col-xs-6">کد سفارش</div>
                        <div class="col-sm-3 col-xs-6">نام کاربری</div>
                        <div class="col-sm-3 hidden-xs">تاریخ</div>
                        <div class="col-sm-3 hidden-xs">وضعیت پرداخت</div>
                        <div class="col-sm-3 col-xs-6">جزئیات</div>
                    </div>

                    <?php

                    if (!empty($orders))
                        foreach ($orders as $value)
                        {
                            $profile = app\models\User::findOne(['id' => $value['user_id']]);
                            $username = $profile['username'];

                            ?>
                            <div class="order-item row col-xs-12">
                                <div class="col-sm-3 col-xs-6"><?= $value['id'] ?></div>
                                <div class="col-sm-3 col-xs-6"><?= $username ?></div>
                                <div class="col-sm-3 hidden-xs"><?= $value['createdTime'] ?></div>
                                <div class="col-sm-3 hidden-xs"><?= (!empty($value['transcationNumber'])) ? 'پرداخت شده' : 'نا معلوم'; ?></div>
                                <div class="order-detail-btn col-sm-3 col-xs-6"><a href="#">جزئیات<i class="icon flaticon-down14"></i></a></div>
                                <div class="order-detail col-xs-12" style="display:none;border-top: 1px solid #c5c5c5;">
                                    <div class="row">
                                        <div class="col-xs-6">نام: <?= $value['fName'] . ' ' . $value['lName']; ?></div>
                                        <div class="col-xs-6">نوع پرداخت: <?= $value['paymentTypeName']; ?></div>
                                        <div class="col-xs-6">آدرس: <?= $value['address']; ?></div>
                                    </div>
                                    <div class="row col-xs-12" style="color: #019e00;font-size: 192%;border-bottom: 1px solid #c1c1c1;margin: 0px;padding: 0px 18px !important;">
                                        <span style="float: right;">قیمت کل: </span><span style="float: left;"><?= number_format($value['sum']); ?> تومان</span>
                                    </div>
                                    <?php

                                    if (!empty($value['SleOrderDetail']))
                                        foreach ($value['SleOrderDetail'] as $value2)
                                        {

                                            ?>
                                            <div class="row" style="margin: 10px auto;border-bottom: 1px solid #c1c1c1;">
                                                <div class="col-xs-12 col-sm-3" style="height: 100%;">
                                                    <img src="<?= $imgBase . Yii::$app->mycomponent->getImageSize($value2['glbImagesProduct']['path'], 'small'); ?>" alt="" class="img-responsive" style="margin: auto;">
                                                    <span class="col-xs-12" style="font-size: 140%;"><?= $value2['product']['name']; ?></span>
                                                </div>
                                                <div class="row col-xs-12 col-sm-9" style="margin: auto">
                                                    <span style="width: 20% !important;" class="order-price col-xs-6 col-sm-3">قیمت واحد: <br><?= number_format($value2['amountPrice']); ?> تومان</span>
                                                    <span style="width: 20% !important;" class="order-price col-xs-6 col-sm-3">تعداد: <br><?= $value2['countNumber']; ?></span>
                                                    <span style="width: 20% !important;" class="order-price col-xs-6 col-sm-3">قیمت: <br><?= number_format($value2['amountPrice'] * $value2['countNumber']); ?> تومان</span>
                                                    <span style="width: 20% !important;" class="order-price col-xs-6 col-sm-3">تخفیف: <br><?= number_format($value2['amountDiscount']); ?> تومان</span>
                                                    <span style="width: 20% !important;" class="order-price col-xs-6 col-sm-3">مبلغ کل: <br><?= number_format($value2['finalAmonutPrice']); ?> تومان</span>
                                                </div>

                                            </div>
                                        <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                </div>
                <?=

                LinkPager::widget([
                    'pagination' => $pages,
                ]);

                ?>
            </div>
        </div>
    </div>
</div>
<style>
    .my-order{
        text-align: center;
    }
    .my-order .row,.my-order .col-xs-6,.my-order .col-sm-3,.my-order .col-sm-9,.my-order .col-sm-12,.my-order .col-xs-12{
        padding: 0 !important;
    }
    .my-order >.row{
        margin: 0 auto !important;
    }
    .my-order .order-item,.my-order .order-item-header {
        margin: 0 auto !important;
        height: 50px;
        line-height: 50px;
        display: table;
    }
    .my-order .order-item:nth-child(even){
        background-color: #e1e1e1;
    }
    .my-order .order-item-header{
        margin: 0 auto !important;
        background-color: #212121;
        color: #FFF;
    }
    .my-order .order-item > div i:before{
        font-size: 59%;
        margin-right: 8px;
    }
    /*    {
            .order-detail span{
                width: 20% !important;
            }
        }*/
</style>
