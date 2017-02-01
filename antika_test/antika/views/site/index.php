<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'My Yii Application';


?>


<div id="mainImage">

        <div id="leftTitle"><a  href="<?=Url::to(['/site/index'])?>" > Alexa parsing </a> </div>
        <div id="rightLogout"><a href="<?=Url::to(['/site/logout'])?>" > Logout </a> </div>


      <div id="input" >
            <form action="<?=Url::to(['/site/pars'])?>" method="post">
                <input name="url" type="text" required placeholder="Type domain" size="40">
                <input type="submit" class="btn btn-primary">
            </form>



      </div>
</div>
<div id="error">
   <?php if ($data===false){ echo "Cant find this site";} ?>
</div>





<div id="information">
    <div id="columns">
        <div id="column">
            <img src="../web/img/icon.png"><br>
            <div id="textInf"> Hello this is alexa parsing site </div>
        </div>
        <div id="column">
            <img src="../web/img/icon.png"><br>
            <div id="textInf"> Hello this is alexa parsing site </div>
        </div>
        <div id="column">
            <img src="../web/img/icon.png"><br/>
            <div id="textInf"> Hello this is alexa parsing site </div>
        </div>
    </div>
</div>





