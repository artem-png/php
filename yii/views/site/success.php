<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Success';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contacts" style="">

    <div class="jumbotron">
        <h1 class="display-3">Order is complete!</h1>
        <p class="lead">Order id is <?=10000-$model->id?>. You can check it again in your cart history.</p>
        <hr class="my-2">
        <p>Within 2 days we will call you. Have patience.</p>
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="<?= Url::home()?>" role="button">Ok</a>
        </p>
</div>

  
</div>
