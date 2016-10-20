<?php



function registerNewUser($email,$pwd,$name,$phone,$adress){
    $email= htmlspecialchars(mysql_real_escape_string($email));
    $pwd= htmlspecialchars(mysql_real_escape_string($pwd));
    $name= htmlspecialchars(mysql_real_escape_string($name));
    $phone= htmlspecialchars(mysql_real_escape_string($phone));
    $adress= htmlspecialchars(mysql_real_escape_string($adress));
    
    $sql= "INSERT INTO users (`email`,`pwd`,`name`,`phone`,`adress`) values ('{$email}','{$pwd}','{$name}','{$phone}','{$adress}')";
    
    $rs=mysql_query($sql);
    
    if ($rs){
        $sql="SELECT * FROM users where (email='{$email}' and pwd = '{$pwd}') LIMIT 1";
        
    
        $rs=mysql_query($sql);
    
        $rs=createSmartyAsArray($rs);
        if(isset($rs[0])){
            $rs['success']=1;
        }
        else {
            $rs['success']=0;
        }
    
    }
    else{
        $rs['success']=0;
        
    }
    
    return $rs;
    
    
    
}

function checkRegisterParams($email,$pwd1,$pwd2){
    $res=null;
    
    
   
    
  
    
    if (!$pwd2){
        $res['success']=false;
        $res['message']="Enter password";
    }
     if (!$pwd1){
        $res['success']=false;
        $res['message']="Enter password2";
    }
      if ($pwd1 != $pwd2){
        $res['success']=false;
        $res['message']="Passwords different";
    }
    if (!$email){
        $res['success']=false;
        $res['message']="Enter email";
    }
    
    return $res;
    
    
    
    
    
    
    
    
    
    }
    
    


function checkUserEmail($email){
    $email=mysql_real_escape_string($email);
    $sql="select id from users where email ='{$email}'";
    $rs=mysql_query($sql);
    $rs=createSmartyAsArray($rs);
    return $rs;
    
}


function loginUser($email,$pwd){
    $email=htmlspecialchars(mysql_real_escape_string($email));
    
    $pwd=md5($pwd);
    
    $sql="SELECT * FROM users where (`email`='{$email}' and `pwd` = '{$pwd}' ) LIMIT 1";
    
    $rs= mysql_query($sql);
    
    $rs=createSmartyAsArray($rs);
   
    if (isset($rs[0])){
        $rs['success']=1;
        
        
    }
    else {
        $rs['success']=0;
        
    }
   
    return $rs;
    
}