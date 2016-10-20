<?php
 include_once ("./library/db.php");
 include_once ("./library/mainfunctions.php");
 $url=null;

function registerCheck(){
    $login = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
    $login=trim($login);
    
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email=trim($email);
   
    $pwd = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
    $pwd=trim($pwd);
    
    $pwdRepeat = isset($_REQUEST['passwordRepeat']) ? $_REQUEST['passwordRepeat'] : null;
    $pwdRepeat=trim($pwdRepeat);
    
    $userData=null;
    $userData['login']=$login;
    $userData['email']=$email;

    $result=null;
    $result['success']=1;
    $result['message']="";
    
    if ($login==null){
        $result['success']=0;
        $result['message']="Введите все поля";
    }
    else if ($email==null){
        $result['success']=0;
        $result['message']="Введите все поля";
    }
    else if ($pwd==null){
        $result['success']=0;
        $result['message']="Введите все поля";
    }
    else if ($pwdRepeat==null){
        $result['success']=0;
        $result['message']="Введите все поля";
    }
    else if(strlen($email)<7){
        $result['success']=0;
        $result['message']="Введите другой email";
    }
    else if(strlen($pwd)<6){
        $result['success']=0;
        $result['message']="Слишком маленький пароль";
    }
    else if(samePasswords($pwd,$pwdRepeat)==0){
        $result['success']=0;
        $result['message']="Пароли не совпадают";
    }
    else if(checkLogin($login)==0){
        $result['success']=0;
        $result['message']="Логин уже существует";
    }
    else if(checkEmail($email)==0){
        $result['success']=0;
        $result['message']="Email уже используется";
    }
    else if(completeRegistration($login,$email,$pwd)==0){
        $result['success']=0;
        $result['message']="Ошибка сервера";
    }
    else{
         $_SESSION['user'] = $userData;
         $result['success']=1;
      

    }
    
    
    global $url;
    
    $result['url']=$url;
    echo json_encode($result);
}

function signupAction(){
    $login = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
    $login=trim($login);
    $pwd = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
    $pwd=trim($pwd);
    
    $pwd= htmlspecialchars(mysql_real_escape_string($pwd));
    $login= htmlspecialchars(mysql_real_escape_string($login));
    
    
    $userData=null;
    $userData['login']=$login;
    

    $result=null;
    $result['success']=1;
    $result['message']="";
    
    
    $us=completeSignup($login,$pwd);
    if ($us){
         $userData['email']=$us['email'];
         $_SESSION['user'] = $userData;
         $result['success']=1;
         
    }
    else {
         $result['success']=0;
         $result['message']="Неверный логин или пароль";
    }
    
    echo json_encode($result);
    
}

function  makeComment(){
    $article = isset($_REQUEST['article']) ? $_REQUEST['article'] : null;
    $article=intval($article);
    $content = isset($_REQUEST['content']) ? $_REQUEST['content'] : null;
    $login= $_SESSION['user']['login'];
    
    $result=null;
    $result['success']=1;
    $result['message']="";
    
    if (strlen($content)<1){
        $result['success']=0;
        $result['message']="Введите сообщение";
    }
    else if (completeComment($article,$content,$login)==0) {
        $result['success']=0;
        $result['message']="Ошибка сервера";
    }
    else {
        $result['success']=1;
    }
    
    echo json_encode($result);
}





