<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\helpers\Url;
$this->title = 'Product';
?>


<div class="site-product">
    <div class="prodDiv" >
    
        <div class="prodImage">
       
            <img class="prodSizeImg"  src="<?php echo Yii::$app->request->baseUrl; ?>/images/<?= $model[0]->image?>" width="500" height="auto"  />
    
    
        </div>
        <div class="prodDesc" >
            <h1 class="display-3" style="font-size:3.4vw"><?= $model[0]->name?> </h1>
            <br/>
            <br/>
            <p class="font-weight-normal" style="font-size:1.4vmax"><?= $model[0]->description?></p>
            <br/>
            <p class="font-weight-normal" style="font-size:1.6vmax;text-align:right"><?= $model[0]->price?></p>
            <br/>
            <br/>
            <br/>
            <br/>
        
            
            <?php if (!Yii::$app->user->isGuest){  ?>
                <?php if ($isActive==1) { ?>
                <?= Html::submitButton("Add to cart!",['class' => 'btn btn-primary','id'=>'addCartButton','onclick' => 'main('.$model[0]->id.')']); ?>
                <?php } else { ?>
                     <h1   class="display-3" style="font-size:1.7vw" value="" >Already in cart.</h1>
                <?php } ?>
                <br/>
                <h4 id="hideme"  class=" list-group-item-action list-group-item-success display-3" style="font-size:1.7vw" value="" style="display:none;" ></h4>
                
                
            <!--["site/addtocart", "id"=>$model[0]->id]-->
          
            
            <?php } else { ?>
            <p class="text-muted" style="font-size:1.6vmax">Login to buy!</p>
            <?php } ?>
        </div>
        
        
    </div>
    
</div>


    


