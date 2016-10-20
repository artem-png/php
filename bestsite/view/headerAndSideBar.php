<html>
<head>
    <meta charset="utf-8">
    <style>
    html {
	   overflow-y: scroll;
    }
    </style>
  
   

     <link rel="stylesheet" href="/style/index.css"  type='text/css'>
     <script src="/javaScript/jquery-3.1.1.js"> </script> 
     <script src="/javaScript/main.js"> </script> 
     
                 
    <link rel='stylesheet' href='/style/bootstrap/css/bootstrap.min.css' type='text/css' media='all'>
   
</head>

<body>
  
     <?php
        include_once ("./controller/indexController.php");
        ?>
    <div id="wrapper">
    

    <header id="head">
        <div  id="name">
         <a href="http://www.bestsite.ru"> Новости </a>
        </div>
        
        <?php if (isset($_SESSION['user'])) {
        $user=$_SESSION['user'];
        ?>
            
            <div>
            
                <div id="auth">
                        <a href="#" >  Здравствуйте, <?= $user['login']?> </a>  
                </div>
                <div id="login">
                        <a href="/account/exit/" >  Выход  </a> 
                </div>
            </div>
        <?php } else {?>
        
    
        
            <div>
            
                <div id="auth">
                        <a href="/account/signup/" >  Авторизация  </a>  
                </div>
                <div id="login">
                        <a href="/account/new/" >  Регистрация  </a> 
                </div>
            </div>
        
        <?php } ?>

        
    </header>
    
    <br>
    <hr style="margin-top:3%">  
      <div id="center">

          <div id="topBar" style="padding-bot:5%">
              
              
            <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA  -->   
        
            <?php 
              $id = getIdCountry();
              if ($id==1){
              ?>
            <div id="rus" >
                <a href="/rus/" style=" color: #000000;" >Новости России</a>  
            </div>
              
              <?php } else { ?>
              
              <div id="rus" >
                <a href="/rus/" style=" color: #6E6E6E;" >Новости России</a>  
            </div>
              
              
               <?php } ?>
              
              
         <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA  -->   
              <?php 
              $id = getIdCountry();
              if ($id==2){
              ?> 
              
              
            <div id="ukr" >
                 <a href="/ukr/"  style=" color: #000000;">Новости Украины</a>
          
            </div>
              
               <?php } else { ?>
              
              
              <div id="ukr" >
                 <a href="/ukr/"  style=" color: #6E6E6E;">Новости Украины</a>
          
                </div>
              
                <?php } ?>
              
              
               <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA  -->   
              
               <?php 
              $id = getIdCountry();
              if ($id==3){
              ?> 
              
              
              
            <div id="world" >
                    <a href="/world/"  style=" color: #000000;">Новости мира</a>
          
            </div>
              
              
               <?php } else { ?>
              
              <div id="world" >
                    <a href="/world/"  style=" color: #6E6E6E;">Новости мира</a>
          
              </div>
               
              <?php } ?>
              
                <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA  -->   
              
               <?php 
              $id = getIdCountry();
              if ($id==4){
              ?> 
              
              
              
            <div id="sport" >
                     <a href="/sport/"  style=" color: #000000;"  >Новости Спорта</a>
          
            </div>
              
              
               <?php } else { ?>
              
              <div id="sport" >
                     <a href="/sport/"  style=" color: #6E6E6E;"  >Новости Спорта</a>
          
            </div>
               
              <?php } ?>
              
              
            
            
          
            
            
            
        
            </div>
