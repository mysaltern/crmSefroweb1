<?php

use yii\helpers\Html;
use yii\helpers\Url;

//$profileUrl = Yii::$app->getModule('auth0')->auth0->getUser()['picture'];
$profileUrl = '2';
$tenantName = (isset(Yii::$app->tenant->identity)) ? Html::encode(Yii::$app->tenant->identity->name) : '--';
$username = (isset(Yii::$app->user->identity)) ? Html::encode(Yii::$app->user->identity->username) : '--';
$logoutUrl = Url::to(['/auth0/user/logout']);
$switchTenantUrl = Url::to(['/auth0/tenant/login']);
$tenantSettingUrl = Url::to(['/setting/update']);
?>

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">

            </a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a name="header-user-dropdown" href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
<?= Html::img($profileUrl, ['alt' => '', 'class' => 'img-circle']) ?>
                            <span class="username username-hide-on-mobile">
                                <small><?= "$tenantName"; ?></small>
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
<?= Html::a('<i class="icon-share-alt"></i> Change Tenant </a>', false, ['value' => $switchTenantUrl, 'class' => 'showModalButton']) ?>
                            </li>
                            <li>
<?= Html::a('<i class="icon-settings"></i> Tenant Setting</a>', false, ['value' => $tenantSettingUrl, 'class' => 'showModalButton']) ?>
                            </li>
                            <li>
<?= Html::a('<i class="icon-key"></i> Log Out </a>', $logoutUrl, ['data-method' => 'post']) ?>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
