<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Faraz Andishan</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="جستجو..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php
        $news = \yii\helpers\Url::to(['/news/index']);
        $newsCategory = \yii\helpers\Url::to(['/categorywriting/index?CategoryWritingSearch[type]=1']);
        $article = \yii\helpers\Url::toRoute(['/article/index']);
        $articleCategory = \yii\helpers\Url::toRoute(['/categorywriting/index?CategoryWritingSearch[type]=2']);
        $page = \yii\helpers\Url::toRoute(['/page/index']);
        $about = \yii\helpers\Url::to(['/about/index']);
        $menu = \yii\helpers\Url::toRoute(['/menu/creator/index']);
        $comment = \yii\helpers\Url::to(['/comment/manage']);
        $slider = \yii\helpers\Url::to(['/slider/manage']);
        $filemanager = \yii\helpers\Url::toRoute(['./filemanager']);



        $products = \yii\helpers\Url::toRoute(['/products/index'], false);
        $category = \yii\helpers\Url::toRoute(['/category/index']);
        $specification = \yii\helpers\Url::toRoute(['/specification/index']);
        $specificationDetail = \yii\helpers\Url::toRoute(['/specificationitem/index']);
        $productshapes = \yii\helpers\Url::toRoute(['/productshapes/index']);
        $productsuppliers = \yii\helpers\Url::toRoute(['/productsuppliers/index']);
        $productmanufacturers = \yii\helpers\Url::toRoute(['/productmanufacturers/index']);





        $productdiscounts = \yii\helpers\Url::toRoute(['/productdiscounts/index']);
        $productdiscountdetails = \yii\helpers\Url::toRoute(['/productdiscountdetails/index']);





        $orders = \yii\helpers\Url::toRoute(['/orders/index']);




        $logvisitor = \yii\helpers\Url::toRoute(['/logvisitor/default/index']);
        $admin = \yii\helpers\Url::to(['/user/admin'], false);





        $uni = \yii\helpers\Url::to(['/uni/index']);
        $major = \yii\helpers\Url::to(['/major/index']);
        $lesson = \yii\helpers\Url::to(['/lesson/index']);
        $grade = \yii\helpers\Url::to(['/grade/index']);
        $professor = \yii\helpers\Url::to(['/professor/index']);
        $thesis = \yii\helpers\Url::to(['/thesis/index']);
        $reference = \yii\helpers\Url::to(['/reference/index']);
        $video = \yii\helpers\Url::to(['/videos/index']);
        ?>
        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        [
                            'label' => 'مدیریت محتوا',
                            'icon' => 'far fa-keyboard',
                            'url' => '#',
                            'items' => [
                                ['label' => 'اخبار', 'icon' => 'far fa-newspaper', 'url' => $news],
                                ['label' => 'دسته بندی اخبار', 'icon' => 'far fa-newspaper', 'url' => $newsCategory],
                                ['label' => 'مقالات', 'icon' => 'fas fa-newspaper', 'url' => $article],
                                ['label' => 'دسته بندی مقالات', 'icon' => 'far fa-newspaper', 'url' => $articleCategory],
                                ['label' => 'صفحات', 'icon' => 'far fa-file', 'url' => $page],
                                ['label' => 'تماس با ما', 'icon' => 'fas fa-phone', 'url' => $about],
                                ['label' => 'منو', 'icon' => 'fas fa-tachometer-alt', 'url' => $menu],
                                ['label' => 'نظرات', 'icon' => 'far fa-comments', 'url' => $comment],
                                ['label' => 'اسلایدر', 'icon' => 'fas fa-cart-arrow-down', 'url' => $slider],
                                ['label' => 'آپلود سنتر', 'icon' => 'fas fa-file-upload', 'url' => $filemanager],
                                ['label' => 'آپلود فیلم', 'icon' => 'fas fa-file-upload', 'url' => $video],
//                                ['label' => 'گالری', 'icon' => 'fas fa-cart-arrow-down', 'url' => ['/menu'],],
                            ],
                        ],
                        [
                            'label' => 'فروشگاه',
                            'icon' => 'fab fa-product-hunt',
                            'url' => '#',
                            'items' => [
                                ['label' => 'محصولات', 'icon' => 'fas fa-shopping-basket', 'url' => $products],
                                ['label' => ' دسته بندی', 'icon' => 'fas fa-stream', 'url' => $category],
                                ['label' => 'ویژگی ', 'icon' => 'fas fa-ellipsis-h', 'url' => $specification],
                                ['label' => 'جزئیات ویژگی', 'icon' => 'fas fa-ellipsis-h', 'url' => $specificationDetail],
                                ['label' => 'شکل محصول ', 'icon' => 'fas fa-shapes', 'url' => $productshapes],
                                ['label' => 'تامین  کننده', 'icon' => 'fas fa-parachute-box', 'url' => $productsuppliers],
                                ['label' => 'تولید کننده', 'icon' => 'fas fa-box-open', 'url' => $productmanufacturers],
                                [
                                    'label' => 'قیمت گذاری و تخفیفات',
                                    'icon' => 'fas fa-money-bill-wave',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'بخش نامه تخفیف', 'icon' => 'fas fa-percentage', 'url' => $productdiscounts],
                                        ['label' => 'اجناس تخفیف', 'icon' => 'circle-o', 'url' => $productdiscounts],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => 'سفارشات',
                            'icon' => 'fas fa-cart-arrow-down',
                            'url' => '#',
                            'items' => [
                                ['label' => 'لیست سفارشات', 'icon' => 'circle-o', 'url' => $orders],
                                ['label' => '', 'icon' => 'circle-o', 'url' => $products],
                            ],
                        ],
                        [
                            'label' => 'مدیریت',
                            'icon' => 'fas fa-cart-arrow-down',
                            'url' => '#',
                            'items' => [
                                ['label' => 'بازدید ها', 'icon' => 'fas fa-cart-arrow-down', 'url' => $logvisitor],
                                ['label' => 'کاربران', 'icon' => 'fas fa-cart-arrow-down', 'url' => $admin],
                            //     ['label' => 'تنظیمات', 'icon' => 'fas fa-cart-arrow-down', 'url' => ['./article/index'],],
                            ],
                        ],
                        [
                            'label' => 'دانشگاه',
                            'icon' => 'fas fa-cart-arrow-down',
                            'url' => '#',
                            'items' => [
                                ['label' => ' دانشگاه', 'icon' => 'fas fa-cart-arrow-down', 'url' => $uni],
                                ['label' => ' درس', 'icon' => 'fas fa-cart-arrow-down', 'url' => $lesson],
                                ['label' => ' منابع درسی', 'icon' => 'fas fa-cart-arrow-down', 'url' => $reference],
                                ['label' => 'مقطع تحصیلی', 'icon' => 'fas fa-cart-arrow-down', 'url' => $grade],
                                ['label' => 'رشته تحصیلی', 'icon' => 'fas fa-cart-arrow-down', 'url' => $major],
                                ['label' => 'استاد', 'icon' => 'fas fa-cart-arrow-down', 'url' => $professor],
                                ['label' => 'پایان نامه', 'icon' => 'fas fa-cart-arrow-down', 'url' => $thesis],
                            ],
                        ],
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                        [
//                            'label' => 'Some tools',
//                            'icon' => 'share',
//                            'url' => '#',
//                            'items' => [
//                                ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                                ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            ],
//                        ],
                    ],
                ]
        )
        ?>

    </section>

</aside>
