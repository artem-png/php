<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.01.2017
 * Time: 14:14
 */


/*
 *
 * checks count. if -9999 then can't gen content
 */


function validation($count){
    if ($count==-9999){
        return false;
    }

    return true;
}


/*
 *
 * validates element. if <img> then returns <img . If <img>>>>>>>>>> returns <img
 */
function elementValidation($element){
    while(true)
    if ($element[strlen($element)-1]==">"){
        $element = substr($element,0,-1);
    }
    else return $element;
}


/*
 *
 * if no http or https add http://
 */

function addHttpToUrl($url)
{
    $url=slashInUrl($url);
    if (!strpos($url, "ttps://") && !strpos($url, "ttp://")) {

        return "http://" . $url;
    }
    else
        return $url;

}


/*
 *
 * if /colnect.com/ returns colnect.com/
 */

function slashInUrl($url){
    while(true) {
        if (strpos($url, "/") === 0) {
            $url = substr($url, 1, strlen($url));

        }
        else return $url;
    }
}

/*
 *
 * returns main domain
 */

function domainFromUrl($url){
    if (strpos($url,"ttps://")){
        $url= substr($url,8,strlen($url));
    }
    else if (strpos($url,"ttp://")){
        $url= substr($url,7,strlen($url));
    }

    if (strpos($url,"/")>0 || strpos($url,"/")===0){
        $url= substr($url,0,strpos($url,"/"));
    }
    return $url;
}