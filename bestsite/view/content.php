   <?php

        getNews();
    ?>
          
          <div id="articlesContent">     
              
                     
            <?php  $a=-1; 
                      global $rs;
                      
              foreach ( $rs as $group ){
              $a=$a+1; ?>
               
                     

                 <?php  if (($a % 3) == 0 ){ ?>
                         <div class="row" style="float:left;width:100%" >  
                   <div class="col-sm-4" style="padding-bottom:1%;" >
                    
                    <div class="card" style="padding:5%; text-align:center;" >
  <img  class="img-thumbnail" src="/pictures/<?= $group['image']?> "   style="width:102%;" 
       alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title"><?= $group['title']?> </h4>
    <p class="card-text"><?= $group['intro']?>...</p>
    <a  href="/<?= getCountry(); ?>/<?= $group['id'] ?>/" class="btn btn-primary btn-lg" >Подробнее</a>
  </div>
</div>
                    
                    
                    </div>
                
                
                
                
                
                  <?php } ?>
                  <?php  if (($a % 3) == 1 ){ ?>
                    
                 <div class="col-sm-4" style="padding-bottom:1%;"  >
                    
                      
                    <div class="card" style="padding:5%; text-align:center;" >
  <img  class="img-thumbnail" src="/pictures/<?= $group['image']?> "style="width:100%;" 
       alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title"><?= $group['title']?> </h4>
    <p class="card-text"><?= $group['intro']?>...</p>
    <a  href="/<?= getCountry(); ?>/<?= $group['id']?>/" class="btn btn-primary btn-lg" >Подробнее</a>
  </div>
</div>
                    
                    
                    </div>
                
                
                
                
                 <?php } ?>
                 <?php  if (($a % 3) == 2 ){ ?>
                
                
                 <div class="col-sm-4"  style="padding-bottom:1%;">
                    
                    
                      
                    <div class="card" style="padding:5%;text-align:center;" >
  <img   class="img-thumbnail" src="/pictures/<?= $group['image']?> " style="width:100%;" 
       alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title"><?= $group['title']?> </h4>
    <p class="card-text"><?= $group['intro']?>...</p>
    <a   href="/<?= getCountry(); ?>/<?= $group['id']?>/" class="btn btn-primary btn-lg" >Подробнее</a>
  </div>
</div>
                    
                    
                    </div>
                
                
                    
                   </div>     
                
                 <?php } ?>
           
         
                
   
                  
                
                  
               
                  
                  
                  
            
              
               
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
                   
              
              
              
          
           
              <?php } ?>
                         
                               
                         
                  
        
              </div> 