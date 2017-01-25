<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">


    <?php NavBar::begin([
        'brandLabel' => 'Books',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    ?>

    <div id="menu">
        <?php
         if ( Yii::$app->user->isGuest ) { ?>
            <li style="margin-top: 5px;"><a style="color:#999" href="<?=Url::to(['/site/reg'])?>"> <span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-ok-sign"></span>  Registration</a>
            </li>

            <li><a style="color:#999" href="<?=Url::to(['/site/login'])?>"> <span class="glyphicon glyphicon-user"></span> Login</a>
            </li>

         <?php } else { ?>

            <li style="margin-top: 15px"><a  href="<?=Url::to(['/site/logout'])?>"><span class="glyphicon glyphicon-off"></span> Logout</a>
            </li>
         <?php } ?>
    </div>


    <?php  NavBar::end(); ?>



    <div class="container">

        <?= $content ?>
    </div>


</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
