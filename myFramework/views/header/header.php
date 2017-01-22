
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<?php
    include_once ("././config/config.php");

    echo '<script type="text/javascript" src="myFramewwork/asserts/main.js"></script>';
    for ($i=0;$i<count($js);$i++) {
        printf('<script type="text/javascript" src="././asserts/js/<?=$js[$i]?>"></script>');

    }
    for ($i=0;$i<count($css);$i++){
        printf('<link rel="stylesheet" href="././asserts/css/<?=$css[$i]?>" type="text/css"/>');

    }
?>

</head>
<body>
<div id="header">Header</div>


