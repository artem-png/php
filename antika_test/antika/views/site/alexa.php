<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.01.2017
 * Time: 19:02
 */

use yii\helpers\Url;
?>
<script type="text/javascript">
    google.charts.load('upcoming', {'packages':['geochart']});
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
            ['Country', 'Percent %'],
            <?php for ($i=0;$i<count($data['mapdata']['country']);$i++) {?>
            [<?="'".$data['mapdata']['country'][$i]."'" ?>, <?= $data['mapdata']['population'][$i] ?>],
            <?php } ?>
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
    }
</script>



<div id="main">

    <div id="leftTitle"><a  href="<?=Url::to(['/site/index'])?>" > Alexa parsing </a> </div>
    <div id="rightLogout"><a href="<?=Url::to(['/site/logout'])?>" > Logout </a> </div>

</div>


<div id="result">
    <div id="url">
        <?= $url ?>
    </div>

    <div id="map">
        <div id="regions_div" style="width: 900px; height: 500px;"></div>

    </div>

    <div id="rank">
        <img class="img-inline " src="http://pcache.alexa.com/images/icons/globe-sm.d0f76e3d37b3db1f5de9a369b65ac33c.jpg" title="Global rank icon" alt="Global rank icon">
        <?= $data['global'] ?>
        <br>
        <img class="img-inline " src="http://pcache.alexa.com/images/flags/us.968591e0050981be9fa94bd2597afb48.png" title="United States Flag" alt="United States Flag">
        <?= $data['country'] ?>
        <br>
    </div>

    <div id="percent">
        <?= $data['percent'] ?>
    </div>

</div>
