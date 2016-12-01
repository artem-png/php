<?php
use app\models\ContactsForm;
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
 
    
    
<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation" >
    <div class="container-fluid">
       
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myBar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand" href="<?= Url::home()?>">SimiNk</a>
        </div>
        <div id="myBar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <li ><a href="<?=Url::to(['/site/index'])?>">Market</a>
                  
                </li>
                <?php if (Yii::$app->user->id==2 ) { ?>
                    <li><a  href="<?=Url::to(['/site/adminorders'])?>"><span class="glyphicon glyphicon-ok-circle"></span>Orders(<span id="adminOrder"><?php

                            $count = (new \yii\db\Query())
                                ->from('contacts_form')
                                ->where(['shown' => '0'])
                                ->count();
                            echo $count;

                            ?></span>)</a>
                    </li>

                <?php } ?>
                  <?php if ( Yii::$app->user->isGuest ) { ?>
                      <li><a href="<?=Url::to(['/site/reg'])?>"> <span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-ok-sign"></span>  Registration</a>
                      </li>
                <li><a href="<?=Url::to(['/site/login'])?>"> <span class="glyphicon glyphicon-user"></span> Login</a>
                </li>

                 <?php } else { ?>
                <li><a  href="<?=Url::to(['/site/cart'])?>"><span class="glyphicon glyphicon-shopping-cart"><span id="cartButton">Cart(<?=  count(Yii::$app->session->get('cart')); ?>)</span></a>
                </li>

                <li><a  href="<?=Url::to(['/site/logout'])?>"><span class="glyphicon glyphicon-off"></span> Logout</a>
                </li>

                
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
   
    
    
    <div class="container" style="padding-top:20px">
       
        <?= $content ?>
    </div>
</div>

<footer class="footer" style="background-color: rgba(17, 117, 184, 1);">
    <div class="container">
        <p class="pull-left " style="color: rgba(255, 255, 255, 1);">&copy; SimiNk <?= date('Y') ?></p>

        <p class="pull-right" style="color: rgba(255, 255, 255, 1);">All right reserved 2016 &copy;</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
