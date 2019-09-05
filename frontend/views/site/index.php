<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>






<header class="masthead text-center text-white d-flex">
    <div class="container my-auto" style="margin-top: 35% !important;">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <!--<hr>-->
                <h1 class="text-uppercase">
                    <strong>پایگاه شخصی دکتر علیرضا پورابراهیمی
                    </strong>
                </h1>

            </div>
            <!--                    <div class="col-lg-8 mx-auto">
                                    <p class="text-faded mb-5">
                                        دکتر علیرضا پورابراهیمی متولد 1347 عضو هیأت علمی و استادیار دانشگاه آزاد اسلامی و دارای دکترای تخصصی مدیریت صنعتی می باشند که از سال 1374 تا کنون به امر تدریس در دانشگاههای کشور اشتغال داشته اند. ایشان در کنار تدریس به امر تحقیق نیز همت گماشته و دارای تألیفات و پژوهش های متعدد علمی بوده و راهنمایی پایان نامه های متعددی را در مقاطع کارشناسی ارشد و دکتری بر عهده داشته اند.
                                    </p>
                                    <p class="text-faded mb-5">
                                        وی مسئولیت های اجرایی مختلفی را نیز در سازمانهای دولتی و غیر دولتی بر عهده داشته و در کارنامه اجرایی خود به ثبت رسانده است.
                                    </p>
                                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                                </div>-->
        </div>
    </div>
</header>

<section class="bg-primary" id="about"
         style="background-image: url('img/darkblue.png');background-repeat: no-repeat;background-size: cover;background-position: center;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <hr class="light my-4">
                <p class="text-faded mb-4 rtl" style="font-size: 20px">
                    دکتر علیرضا پورابراهیمی متولد 1347 عضو هیأت علمی و استادیار دانشگاه آزاد اسلامی و دارای دکترای تخصصی
                    مدیریت صنعتی می باشند که از سال 1374 تا کنون به امر تدریس در دانشگاههای کشور اشتغال داشته اند. ایشان
                    در کنار تدریس به امر تحقیق نیز همت گماشته و دارای تألیفات و پژوهش های متعدد علمی بوده و راهنمایی
                    پایان نامه های متعددی را در مقاطع کارشناسی ارشد و دکتری بر عهده داشته اند.
                </p>
                <p class="text-faded mb-4 rtl" style="font-size: 20px">
                    وی مسئولیت های اجرایی مختلفی را نیز در سازمانهای دولتی و غیر دولتی بر عهده داشته و در کارنامه اجرایی
                    خود به ثبت رسانده است.
                </p>
                <!--<a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>-->
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container-fluid rtl">
        <div class="row justify-content-md-center">




            <?php
            foreach ($article as $ar)
            {
                $photo = Yii::$app->urlManager->createAbsoluteUrl(['/file', 'id' => $ar['photo']]);
                $urlDetailsArticle = Url::to(['article/view', 'id' => $ar['id']]);
                ?>



                <div class="col-lg-2 text-center main-card-frame main-card-back1">
                    <div class="RIF mb-2">
                        <img src="<?= $photo; ?>" alt="" />
                    </div>
                    <p>
                        <?= $ar['title']; ?>
                    </p>
                    <p><?= $ar['content']; ?></p>
                    <a href="<?= $urlDetailsArticle; ?>" > ادامه...</a>
                </div>







                <?php
            }
            ?>











        </div>
    </div>
</section>

<!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/emam-sadegh.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/emam-sadegh.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/emam-sadegh.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">قبلی</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">بعدی</span>
    </a>
</div>-->




<!--
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">قابل توجه کاربران و دانشجویان محترم</h2>
                        <hr class="my-4">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <i class="fas fa-4x fa-gem text-primary mb-3 sr-icon-1"></i>
                            <h3 class="mb-3">Sturdy Templates</h3>
                            <p class="text-muted mb-0">Our templates are updated regularly so they don't break.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <i class="fas fa-4x fa-paper-plane text-primary mb-3 sr-icon-2"></i>
                            <h3 class="mb-3">Ready to Ship</h3>
                            <p class="text-muted mb-0">You can use this theme as is, or you can make changes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <i class="fas fa-4x fa-code text-primary mb-3 sr-icon-3"></i>
                            <h3 class="mb-3">Up to Date</h3>
                            <p class="text-muted mb-0">We update dependencies to keep things fresh.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <i class="fas fa-4x fa-heart text-primary mb-3 sr-icon-4"></i>
                            <h3 class="mb-3">Made with Love</h3>
                            <p class="text-muted mb-0">You have to make your websites with love these days!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

<section class="p-0" id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/g1.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/g1.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <!--                                    <div class="project-category text-faded">
                                                                    Category
                                                                </div>-->
                            <div class="project-name">
                                جشن فارق التحصیلی اولین سری دانشجویان واحد الکترونیکی
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/g2.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/g2.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <!--                                    <div class="project-category text-faded">
                                                                    Category
                                                                </div>-->
                            <div class="project-name">
                                برنامه تلویزیونی طلوع با موضوع امنیت فضای مجازی
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/g3.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/g3.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <!--                                    <div class="project-category text-faded">
                                                                    Category
                                                                </div>-->
                            <div class="project-name">
                                سخنرانی، شرکت داده ورزی سداد
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/g4.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/g4.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <!--                                    <div class="project-category text-faded">
                                                                    Category
                                                                </div>-->
                            <div class="project-name">
                                رونمایی طرح، شرکت داده ورزی سداد
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/g5.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/g5.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <!--                                    <div class="project-category text-faded">
                                                                    Category
                                                                </div>-->
                            <div class="project-name">
                                باشگاه پژوهشگران جوان
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/g6.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/g6.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <!--                                    <div class="project-category text-faded">
                                                                    Category
                                                                </div>-->
                            <div class="project-name">
                                گفتگوی تلویزیونی در برنامه طلوع
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<section id="services" class="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">قابل توجه کاربران و دانشجویان محترم</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="alert alert-primary text-right" role="alert">
                    <i class="far fa-check-square"></i> برای ارسال تکالیف درسی خود ابتدا باید در سایت ثبت نام کرده و سپس
                    از طریق پنل ویژه دانشجویان اقدام کنید .
                </div>
                <div class="alert alert-primary text-right" role="alert">
                    <i class="far fa-check-square"></i> برای ارسال اطلاعات و فایل پایان نامه خود، پس از ثبت نام در سایت،
                    فرمی را که در پنل ویژه دانشجویان قرار دارد به دقت پر کرده و ارسال نمایید.
                </div>
                <div class="alert alert-primary text-right" role="alert">
                    <i class="far fa-check-square"></i> مطالب درسی مورد نیاز شما در قسمت پنل ویژه دانشجویان و در لینک
                    "مطالب درسی" قابل دسترس است.
                </div>
                <div class="alert alert-primary text-right" role="alert">
                    <i class="far fa-check-square"></i> کلیه سوالات و مشکلات خود را در کاربری وبسایت، از طریق آدرس
                    ایمیلی که در قسمت پشتیبانی فنی قرار داده شده است، پی گیری نمایید.
                </div>
            </div>
            <div class="col-lg-2 d-none d-lg-flex icon-bar">
                <i class="fas fa-graduation-cap fa-4x wow fadeInUp dark-blue" data-wow-duration="1s"
                   data-wow-delay="0.5s"></i>
                <i class="fas fa-university fa-4x wow fadeInUp dark-blue" data-wow-duration="1s"
                   data-wow-delay="1s"></i>
                <i class="fas fa-user-graduate fa-4x wow fadeInUp dark-blue" data-wow-duration="1s"
                   data-wow-delay="1.5s"></i>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark text-white">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 col-xs-12 mb-3">
                <h2 class="mb-4">دانلود مقالات</h2>
                <?php
                $upload = Url::to(['document/upload']);
                ?>
                <a class="btn btn-light btn-xl sr-button"
                   href="<?= $upload; ?>">دانلود کنید</a>
            </div>

            <?php
            $login = Url::to(['user/login']);
            $reference = Url::to(['reference/index']);
            ?>
            <div class="col-lg-6 col-xs-12 mb-3">
                <h2 class="mb-4">پنل ویژه دانشجویان</h2>
                <?php if (!\Yii::$app->user->isGuest) { ?>
                    <a class="btn btn-light btn-xl sr-button"
                       href="<?= $reference; ?>">منابع درسی</a>
                <?php } else { ?>
                    <a class="btn btn-light btn-xl sr-button"
                       href="<?= $login; ?>">وارد شوید</a>
                <?php } ?>

            </div>
        </div>
    </div>
</section>