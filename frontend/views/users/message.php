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
/**
 * @var yii\web\View $this
 * @var dektrium\user\Module $module
 */


/** @var TYPE_NAME $login */
$login = Url::to(['/user/login']);
?>

<?= $this->render('/_alert', ['module' => $module]);
 ?>
<h5>

ثبت نام با موفقیت انجتم شد برای ورود<a class="navbar-brand js-scroll-trigger" href="<?= $login; ?>">اینجا</a> کلیک کنید
</h5>