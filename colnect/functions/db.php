<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.01.2017
 * Time: 15:04
 */
$db = mysql_connect("localhost","root",""); /*Подключение к серверу */
$link=mysql_select_db("colcnet",$db)  or die ("Ошибка " . mysqli_error($link));

/*
 *
 * function add domain if it isn't exist
 */

function addDomain($url)
{
    $query = "SELECT * FROM `domain` WHERE `name` = '" . $url . "'";
    $result = mysql_query($query);
    $n = mysql_num_rows($result);
    if ($n > 0) {

    } else

        $sql = mysql_query("INSERT INTO `domain` (`name`) VALUES ('" . $url . "')");




}


/*
 *
 * function add url if it isn't exist
 */


function addUrl($url){
    $query = "SELECT * FROM `url` WHERE `name` = '".$url."'";
    $result = mysql_query ( $query );
    $n = mysql_num_rows ( $result );
    if ($n>0){

    }
    else
    $sql = mysql_query("INSERT INTO `url` (`name`) VALUES ('".$url."')");
}

/*
 *
 * function add  element if it isn't exist
 */

function addElement($element){
    $query = "SELECT * FROM `element` WHERE `name` = '".$element."'";
    $result = mysql_query ( $query );
    $n = mysql_num_rows ( $result );
    if ($n>0){

    }
    else
    $sql = mysql_query("INSERT INTO `element` (`name`) VALUES ('".$element."')");
}


/*
 *
 * function add request
 */

function addRequest($domain,$url,$element,$count,$time,$duration){
    addUrl($url);
    addElement($element);
    addDomain($domain);
    $domain=domainId($domain);
    $url=urlId($url);
    $element=elementId($element);


    $sql = mysql_query("INSERT INTO `request` (`domain_id`,`url_id`,`element_id`,`count`,`duration`) VALUES ('".$domain."','".$url."','".$element."','".$count."','".$duration."')");
    return $sql;

}


// gets id of url
function urlId($url){
    $query = "SELECT * FROM `url` WHERE `name` = '".$url."'";
    $result = mysql_query ( $query );



    while ($id = mysql_fetch_assoc($result)){
        if ($id['name']==$url)
            return $id['id'];
    }
}
//gets id of element
function elementId($url){
    $query = "SELECT * FROM `element` WHERE `name` = '".$url."'";
    $result = mysql_query ( $query );




    while ($id = mysql_fetch_assoc($result)){
        if ($id['name']==$url)
            return $id['id'];
    }

}


//gets id of domain
function domainId($url){
    $query = "SELECT * FROM `domain` WHERE `name` = '" . $url . "'";
    $result = mysql_query($query);




    while ($id = mysql_fetch_assoc($result)){
        if ($id['name']==$url)
            return $id['id'];
    }
}

//gets count url in db of domain
function allUrlFromDomain($domain){
    $query = "SELECT * FROM `url`";
    $result = mysql_query($query);
    $count=0;
    while ($id = mysql_fetch_assoc($result)){
        if (strpos($id['name'],$domain)===0 || strpos($id['name'],$domain)>0)
            $count++;
    }
    return $count;
}


// gets average time of domain
function averageTimeDomain($domain){
    $query = "SELECT * FROM `request` WHERE ( ((UNIX_TIMESTAMP(`time`) - UNIX_TIMESTAMP( now()))/3600<24 ) )";
    $result = mysql_query($query);
    $count=0;
    $sum=0;
    while ($id = mysql_fetch_assoc($result)){
        if ($id['domain_id']==domainId($domain)) {
            $count++;
            $sum+=$id['duration'];
        }

    }
    if ($count==0) return 0;
    return $sum/$count;
}


//gets count element in domain
function countTagDomain($domain,$tag){
    $query = "SELECT * FROM `request`";
    $result = mysql_query($query);
    $sum=0;

    while ($id = mysql_fetch_assoc($result)){
        if ($id['domain_id']==domainId($domain)) {
            if ($id['element_id']==elementId($tag))
             $sum+=$id['count'];
        }

    }
    return $sum;
}

//gets total count of element in all domains


function totalTagCount($element){
    $query = "SELECT * FROM `request`";
    $result = mysql_query($query);
    $count=0;
    while ($id = mysql_fetch_assoc($result)){
        if ($id['element_id']==elementId($element))
            $count+=$id['count'];
    }
    return $count;

}

//return false if here no identical requests in 5 min, and returns array of data if here is identical request

function repeatSearch($url,$tag){
    $query = "SELECT * FROM `request` WHERE ( ((UNIX_TIMESTAMP(`time`) - UNIX_TIMESTAMP( now()))/60<5 ) ) ";
    $result = mysql_query($query);
    while ($id = mysql_fetch_assoc($result)){
        if ($id['element_id']==elementId($tag))
            if ($id['url_id']==urlId($url))
                return $id;

    }
    return false;
}
