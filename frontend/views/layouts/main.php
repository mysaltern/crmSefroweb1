<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use pceuropa\menu\Menu;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

AppAsset::register($this);
$css = Url::base(true) . '/css';
$js = Url::base(true) . '/js';
$img = Url::base(true) . '/img';
$vendor = Url::base(true) . '/vendor';
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">


    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>پایگاه شخصی دکتر علیرضا پورابراهیمی</title>

        <!-- Bootstrap core CSS -->
        <link href="<?= $vendor; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--<link href="vendor/bootstrap/css/bootstrap-rtl.css" rel="stylesheet" type="text/css"/>-->

        <!-- Custom fonts for this template -->
        <link href="<?= $vendor; ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
              rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
              rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="<?= $vendor; ?>/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= $css; ?>/creative.css" rel="stylesheet">
        <link href="<?= $css; ?>/wow.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $css; ?>/mrh.css" rel="stylesheet" type="text/css"/>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>


    <?php
    $login = Url::to(['user/login']);
    $logout = Url::to(['user/logout']);
    ?>

    <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <?php if (!\Yii::$app->user->isGuest) { ?>
                <a class="navbar-brand js-scroll-trigger" href="<?= $logout ?>">خروج</a>
            <?php } else { ?>
                <a class="navbar-brand js-scroll-trigger" href="<?= $login; ?>">ورود</a>
            <?php } ?>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-12 col-lg-12">
                <div class="menu_area">
                    <nav class="navbar navbar-expand-lg navbar-light">
                       
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#ca-navbar"
                                aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span
                                    class="navbar-toggler-icon"></span></button>
                        <!-- Menu Area -->


                        <div class="collapse navbar-collapse rtl" id="ca-navbar">


                            <?php
                            echo Nav::widget(['options' => ['class' => 'navbar-nav navbar-right', 'id' => 'nav'],
                                'items' => Menu::NavbarRight(5)  // argument is id of menu
                            ]);
                            ?>


                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </nav>


    <?= $content ?>


    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading">کاربر گرامی؛</h2>
                    <hr class="my-4">
                    <p class="mb-5">لطفاً در صورت وجود هرگونه مشکل فنی در کاربری این سایت، با ایمیل زیر مکاتبه و یا با
                        شماره اعلام شده تماس حاصل نمایید.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center">
                    <i class="fas fa-phone fa-3x mb-3 sr-contact-1"></i>
                    <p>(خورش) 09126359688</p>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
                    <p>
                        <a href="mailto:your-email@your-domain.com">support@apebrahimi.com</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= $vendor; ?>/jquery/jquery.min.js"></script>
    <script src="<?= $vendor; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= $vendor; ?>/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= $vendor; ?>/scrollreveal/scrollreveal.min.js"></script>
    <script src="<?= $vendor; ?>/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= $js; ?>/creative.min.js"></script>
    <script src="<?= $js; ?>/wow.min.js" type="text/javascript"></script>
    <script src="<?= $js; ?>/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    </body>

    </html>


<?php $this->endPage() ?>