<?php


function completeSignup($login,$password){
    $password=md5($password);
    
    $sql="SELECT * from users where (`login`='".$login."' and `password`='".$password."' ) limit 1";
    $rs = mysql_query($sql);
    $rs= mysql_fetch_assoc($rs);

    return ($rs);
    
    
    
    
    
    
    
}
function samePasswords($p1,$p2){
    if ($p1==$p2) return 1;
        else return 0;
}

function checkLogin($login){
    $sql="SELECT * from users where login= '".$login."' LIMIT 1";
    $rs=mysql_query($sql);
    $rs=mysql_fetch_assoc($rs);
    if ($rs) return 0;
    else return 1;
}

function checkEmail($email){
    $sql="SELECT * from users where email= '".$email."' LIMIT 1";
    $rs=mysql_query($sql);
    $rs=mysql_fetch_assoc($rs);
    if ($rs) return 0;
    else return 1;
}

function completeRegistration($login,$email,$pwd){
    
    $email= htmlspecialchars(mysql_real_escape_string($email));
    $pwd= htmlspecialchars(mysql_real_escape_string($pwd));
    $login= htmlspecialchars(mysql_real_escape_string($login));
    $pwd=md5($pwd);
    $sql="INSERT into users (`login`,`email`,`password`) values ('".$login."','".$email."','".$pwd."')";
    $rs=mysql_query($sql);
    if ($rs){
        $sql="SELECT * FROM users where `email`='".$email."'";
        
    
        $rs=mysql_query($sql);
    
        $rs=mysql_fetch_assoc($rs);
       
        if(($rs)){
           
           return 1;
        }
        else {

            return 0;
        }
    
    }
    else{
        return 0;
        
    }
}

  function da ($value = null, $die=1){
        echo 'Debug: <br/><pre>';
        print_r($value);
        echo '</pre>';
    
        if ($die) die;
    
}

function exitUser(){
    if (isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    redirect('/');
}

function redirect($addr){
    
    if (!$addr) $addr='/';
    header("Location: {$addr}");
    exit();
    
}

function completeComment($article,$content,$login){
    $date = getdate();
    $date_today= $date['year']."-".$date['mon']."-".$date['mday'];

    $sql= "INSERT into comments (`article_id`, `login`, `content`, `date`) VALUES ('".$article."','".$login."','".$content."','".$date_today."')";
    $rs=mysql_query($sql);
    return $rs;
    
    
    
    
}
