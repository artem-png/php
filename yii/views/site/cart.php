<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
 $total=0;
$this->title = 'Cart';
?>
<ul class="nav nav-tabs">
  <li id="one" class="nav-item active">
    <a  class="nav-link active" href="<?= Url::to(['/site/cart'])?>">Current cart</a>
  </li>
  <li id="two" class="nav-item">
    <a  class="nav-link" href="<?= Url::to(['/site/history'])?>">Last purchases</a>
  </li>

</ul>
    
<?php    
    
if (count($cart)<1){ ?>
    <h1 class="display-4" >Cart is empty.</h1>
<?php } else { 
      global $total;
      for ($i=0;$i< count($cart);$i++){
          $total=$total+$cart[$i]->price*$cart[$i]->quantity;
      }

?>



<div class="site-cart" style="text-align:center;">
<table class="table" >
  <thead class="thead-default">
    <tr>
      <th>#</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
      
   <?php
      $a=0;
       for ($i=0;$i< count($cart);$i++){
           global $a;
           $a++;
      
   ?>
      <tr id="delete<?=$a?>" >
      
          <th scope="row"><?= $a ?></th>
      
          <td>  
              <a href="<?= Url::to(['/site/product', 'id' => $cart[$i]->id])?>" > <p class="text-muted" style="font-size:1.5vmax"><?=$cart[$i]->name?></p> </a>
              <img    src="<?php echo Yii::$app->request->baseUrl; ?>/images/<?= $cart[$i]->image?>"  height="150"  /> 
              
             
          </td>


      
          <td><br/><br/><br/><h4> <?= Html::input('number','count'.$a.'' , $cart[$i]->quantity, ['class' => 'form-control' ,'onchange'=> 'costRefresh('. $cart[$i]->price.','.$a.')']); ?></h4></td>
        
          <td><br/><br/><br/><h4 id="totalPrice<?=$a?>" ><?= $cart[$i]->quantity*$cart[$i]->price?></h4></td>
    <td><br/><br/><br/> <h4  style="text-align:center;"  onclick="deleteProd(<?=$a?>)"> <a href="#" >Delete</a> </h4>  </td>
   
      </tr>
      
    <?php } ?>  
      
  </tbody>
</table>
</div>
 <div  style="text-align:right"><h3 class="display-4" >Total:<span  id="total" class="display-4" ><?=$total?></span></h3> </div>
<a  style="text-align:right" href="<?= Url::to(['/site/contacts'])?>" class="btn btn-primary">Confirm | <span class="glyphicon glyphicon-ok"></span> </a>
 
 <?php } ?>