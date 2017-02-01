<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.01.2017
 * Time: 18:53
 */

namespace app\models;
include_once "simple_html_dom.php";

class Parser
{

    function pars($url){
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, "http://www.alexa.com/siteinfo/"."$url");

        $request = 'COPY /var/www/documents/test/test.pdf  HTTP/1.1
Host: localhost.ru
Destination: http://localhost.ru/test.pdf
Overwrite: F
Depth: infinity
Accept: */*
Content-type: application/xml; charset="utf-8"';
        $split = explode("\n",$request);

        curl_setopt ($ch, CURLOPT_HTTPHEADER,$split );


        curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1" );
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec ($ch);
        if (strlen($result)<2000) return false;

        curl_close($ch);

        $html = str_get_html($result);



        $percent=$html->find('#demographics_div_country_table');
        $percent=$percent[0];
        $percent=$percent->outertext;

        $rank=$html->find('.metrics-data');
        $globalRank=$rank[0];
        $countryRank=$rank[1];

        $mapdata=[];
        $html = str_get_html($percent);

        $countries=$html->find('a');


        for ($i=0;$i<count($countries);$i++) {
            $str = $countries[$i]->innertext;
            $pos = strpos($str, ">");
            $mapdata['country'][$i] = substr($str, $pos + 8);
        }




        $population=$html->find('span');
        $j=0;
        for ($i=0;$i<count($population)-1;$i++) {
            if ($i % 2 == 0) {
                $str = $population[$i]->innertext;
                $pos = strpos($str, "%");
                $mapdata['population'][$j++] = substr($str, 0, $pos );
            }
        }











        $result=[];
        $result['percent']=$percent;
        $result['global']=$globalRank->outertext;
        $result['country']=$countryRank->outertext;
        $result['mapdata']=$mapdata;




        return $result;
    }


}