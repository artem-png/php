<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = 'Market';
?>
<div class="site-index">
<div class="card-deck-wrapper">
    <div class="card-deck">
    <?php $a=0; foreach ($model as $prod): global $a; $a=$a+1; ?>
      
          <div class="card" style="float:left;width:33%;padding-bottom:2%;padding-left:5%; text-align:center;">
             <a href="<?= Url::to(['/site/product', 'id' => $prod->id])?>" ><img  class="catalogSizeImg" src="<?php echo Yii::$app->request->baseUrl; ?>/images/<?= $prod->image?>" width="300" height="auto" 
                alt="Card image cap"></a>
                <div class="card-block">
                        <h4 class="card-title" style="height:60px" ><?= $prod->name ?></h4>
                        <p class="card-text">Price : <?= $prod->price ?> </p>
                        <a href="<?= Url::to(['/site/product', 'id' => $prod->id])?>" class="btn btn-primary">Look!</a>
                </div>
              
          </div>
       
    <?php if ($a % 3 == 0 ) echo("</div></div> <div class='card-deck-wrapper'> <div class='card-group'>"); endforeach; ?>
    </div>
    </div>
  
<br/><br/>
<div class="linkPage">
<?= LinkPager::widget(['pagination' => $pagination, 'prevPageLabel'=>'Back', 'nextPageLabel' => 'Next']) ?>

</div>
  
</div>
