<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Order';

?>
<ul class="nav nav-tabs">
  <li id="one" class="nav-item ">
    <a  class="nav-link" href="<?= Url::to(['/site/cart'])?>">Current cart</a>
  </li>
  <li id="two" class="nav-item">
    <a  class="nav-link" href="<?= Url::to(['/site/history'])?>">Last purchases</a>
  </li>
    <li id="three" class="nav-item active">
    <a  class="nav-link">id <?= 10000-$model->id ?> </a>
  </li>

</ul>

<?php  
  
      

?>



<div class="site-cart" style="text-align:center;">
<table class="table" >
  <thead class="thead-default">
    <tr>
      <th>#</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
      
   <?php
      $a=0;
       for ($i=0;$i< count($model->cart);$i++){
           global $a;
           $a++;
      
   ?>
      <tr id="delete<?=$a?>" >
      
          
          <th scope="row"><?= $a ?></th>
      
          
          <td>  
              <a href="<?= Url::to(['/site/product', 'id' => $model->cart[$i]->id])?>" > <p class="text-muted" style="font-size:1.5vmax"><?=$model->cart[$i]->name?></p> </a>
              <img    src="<?php echo Yii::$app->request->baseUrl; ?>/images/<?= $model->cart[$i]->image?>"  height="150"  />   
          </td>


      
           <td><br/><br/><br/><h4 id="totalPrice<?=$a?>" ><?= $model->cart[$i]->quantity?></h4></td>
        
          <td><br/><br/><br/><h4 id="totalPrice<?=$a?>" ><?= $model->cart[$i]->quantity*$model->cart[$i]->price?></h4></td>
   
      </tr>
      
    <?php } ?>  
      
  </tbody>
</table>
</div>
 

<div  style="text-align:right"><h3 class="display-4" >Total:<span  id="total" class="display-4" ><?=$total?></span></h3> </div>