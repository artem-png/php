<?php
include_once ("./functions/help.php");
include_once ("./functions/db.php");

/*
 *
 *
 * checking is that ajax method or not if no -  load main page
 * $_POST['url'] and $_POST['tag'] its input
 */

function checkAjax()
{
    if (isset($_POST['url']) && isset($_POST['tag'])) {

        ajaxAnswer();
    } else {

        include_once("./view/main.php");

    }
}


/*
 *
 * method form answer to client
 * if all ok it sends count tag, success=1, date,url,tag, time of work
 * if we can't get content from url sends success=0
 *
 */

function ajaxAnswer(){
    /*timer init */
    $mtime = microtime();
    $mtime = explode(" ", $mtime);
    $tstart = $mtime[1] + $mtime[0];
    /* timer init end */

    $tag= elementValidation($_POST['tag']);
    $url= addHttpToUrl($_POST['url']);
    $res=repeatSearch($url,$tag);
    if (!$res) {
        $count = countTagFromUrl($url, $tag);
        if (validation($count)) {
            $data['count'] = $count;
            $data['success'] = 1;


            $data['date'] = date("F j, Y, g:i a");
            $data['url'] = $url;
            $data['tag'] = $tag;


            /*timer result*/
            $mtime = microtime();
            $mtime = explode(" ", $mtime);
            $mtime = $mtime[1] + $mtime[0];
            $totaltime = ($mtime - $tstart);
            /*timer result ends*/

            $data['time'] = substr($totaltime, 0, 6) . " sec";
            $data['request'] = addRequest(domainFromUrl($url), $url, $tag, $count, date("F j, Y, g:i a"), substr($totaltime, 0, 6) . " sec");
            $data['allUrlDomain'] = allUrlFromDomain(domainFromUrl($url));
            $data['averageTime'] = averageTimeDomain(domainFromUrl($url));
            $data['countTagDomain'] = countTagDomain(domainFromUrl($url), $tag);
            $data['totalTag'] = totalTagCount($tag);
            $data['domain'] = domainFromUrl($url);


        } else {
            $data['success'] = 0;
            $data['url'] = $url;
        }

    }
    else {
        $data['count'] = $res['count'];
        $data['success'] = 1;
        $data['date'] = date("F j, Y, g:i a");
        $data['url'] = $url;
        $data['tag'] = $tag;
        /*timer result*/
        $mtime = microtime();
        $mtime = explode(" ", $mtime);
        $mtime = $mtime[1] + $mtime[0];
        $totaltime = ($mtime - $tstart);
        /*timer result ends*/
        $data['time'] = substr($totaltime, 0, 6) . " sec";
        $data['request'] = addRequest(domainFromUrl($url), $url, $tag, $res['count'], date("F j, Y, g:i a"), averageTimeDomain(domainFromUrl($url)));
        $data['allUrlDomain'] = allUrlFromDomain(domainFromUrl($url));
        $data['averageTime'] = averageTimeDomain(domainFromUrl($url));
        $data['countTagDomain'] = countTagDomain(domainFromUrl($url), $tag);
        $data['totalTag'] = totalTagCount($tag);
        $data['domain'] = domainFromUrl($url);


    }

    echo json_encode($data);
}



/*
 * function that gives us  content from web site ($url) and search substr($tag)
 * returns count of substr in site
 * returns -9999 if cant load page
 */



function countTagFromUrl($url,$tag){
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1" );
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec ($ch);
    curl_close($ch);
    if (strlen($result)>0)
    return substr_count($result,$tag);
    else return -9999;
}


