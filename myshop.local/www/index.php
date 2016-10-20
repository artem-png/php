<?php

    session_start();

    if (! isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
    }
    include_once '../config/config.php';  
    include_once '../config/db.php';//Constant
    include_once '../library/mainFunctions.php';  //main Functions (load Pages , etc )
    

    $controllerName = isset($_GET['controller']) ?     ucfirst($_GET['controller']) : 'Index'; // which controller

    


    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';   //which action in your controller


    if (isset($_SESSION['user'])){
        $smarty->assign('arUser',$_SESSION['user']);
    }
    
    $smarty->assign('cartCntItems',count($_SESSION['cart']));

    loadPage($smarty,$controllerName,$actionName); //load page with this controller and action 
    

    
   

   
   



