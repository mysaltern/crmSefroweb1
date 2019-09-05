<?php

use yii\bootstrap\Nav;
use anli\metronic\widgets\NavBar;

$items = $this->params['sidebarItems'];
?>

<!-- BEGIN NAVBAR -->
<?php
NavBar::begin([
    'containerOptions' => ['class' => 'page-sidebar'],
    'options' => ['class' => 'page-sidebar-wrapper', 'tag' => 'div'],
    'renderInnerContainer' => false,
]);
?>
<?=
Nav::widget([
    'items' => $items,
    'encodeLabels' => false,
    'options' => [
        'class' => 'page-sidebar-menu page-sidebar-menu-light page-sidebar-menu-hover-submenu',
        'data-keep-expanded' => 'false',
        'data-auto-scroll' => 'true',
        'data-slide-speed' => '200',
    ],
]);
?>

<?php NavBar::end(); ?>
<!-- END NAVBAR -->
