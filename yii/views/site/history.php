<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = 'History';
?>
<ul class="nav nav-tabs">
  <li id="one" class="nav-item ">
    <a  class="nav-link" href="<?= Url::to(['/site/cart'])?>">Current cart</a>
  </li>
  <li id="two" class="nav-item active">
    <a  class="nav-link " href="<?= Url::to(['/site/history'])?>">Last purchases</a>
  </li>

</ul>
    
<?php    
    
if (count($cart)<1){ ?>
    <h1 class="display-4" >History is empty.</h1>
<?php } else {  ?>



<div class="site-cart" style="text-align:left;">
<table class="table" >
  <thead class="thead-default">
    <tr>
      <th>id</th>

      <th>date</th>
      <th>phone</th>
      <th>address</th>
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
      
   <?php
      $a=0;
       for ($i=0;$i<count($cart);$i++){
           
      
   ?>
      <tr id="delete<?=$a?>" >
      
          <th scope="row"><?= 10000-$cart[$i]->id ?></th>


          
          
          <td>  
             
              <?= $cart[$i]->date ?>
             
          </td>


      
          
          
          <td> 
              <?= $cart[$i]->phone ?>
          </td>
        
          
          
          
          <td>
                <?= $cart[$i]->address ?>
          </td>
          
          
          
          
          
          <td> 
              <a href="<?= Url::to(['/site/purchase', 'id' => $cart[$i]->id])?>" > Show </a> 
          </td>
          
          
          

   
      </tr>
      
    <?php } ?>  
      
  </tbody>
</table>
</div>
 
<div class="linkPage">
<?= LinkPager::widget(['pagination' => $pagination, 'prevPageLabel'=>'Back', 'nextPageLabel' => 'Next']) ?>

</div>
 <?php } ?>