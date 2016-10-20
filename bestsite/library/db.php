<?php

$dblocation="127.0.0.1";
$dbname="myNews";
$dbuser="root";
$dbpassword="";


$db=mysql_connect($dblocation,$dbuser,$dbpassword);

if (!$db){
    echo "Can't connect with mysql";
    exit();
}

mysql_set_charset('utf8');
if ( ! mysql_select_db($dbname,$db)){
    echo "Can't connect with db";
}
