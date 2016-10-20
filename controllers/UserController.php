<?php

    include_once '../models/CategoriesModel.php';
    include_once '../models/UsersModel.php';


function indexAction(){
    
    
    
    
    
    
}

function registrAction(){

    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
  
    $email=trim($email);
    
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    
    $name=trim($name);
    
    $resData= array();
    
    $resData = checkRegisterParams($email,$pwd1,$pwd2);
    if (!$resData && checkUserEmail($email)){
        $resData['success']=false;
        $resData['message']="Enter another email";
    }
    
    if (!$resData){
        $pwdM5=md5($pwd1);
        $userData = registerNewUser($email,$pwdM5,$name,$phone,$adress);
        if ($userData['success']){
            $resData['message']="Registered successfuly";
            $resData['success']=1;
            
            $userData=$userData[0];
            $resData['username']=$userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail']=$email;
            
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] =$userData['name'] ? $userData['name']: $userData['email'];
            
            
            
            
        }
        else{
            
            $resData['success']=0;
            $resData['message']="Error";
            
        }
        
       
    }
    

    echo json_encode($resData);

    
    
    
}


function logoutAction(){
    if (isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
        
    redirect('/');
}


function loginAction(){
    $email = isset($_REQUEST['loginEmail']) ? $_REQUEST['loginEmail'] : null;
    $email=trim($email);
    $pwd = isset($_REQUEST['loginPwd']) ? $_REQUEST['loginPwd'] : null;
    $pwd=trim($email);
    $userData=loginUser($email,$pwd);
   
    if ($userData['success']){
        $userData=$userData[0];
        $_SESSION['user']=$userData;
        $_SESSION['user']['displayName']=$userData['name']?$userData['name'] : $userData['email'];
        $resData=$_SESSION['user'];
        $resData['success']=1;
        
        
    }
    else {
        $resData['success']=0;
        $resData['message']="Wrong login or password";
        
        
        
    }
    
    echo json_encode($resData);
}
