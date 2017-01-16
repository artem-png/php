
<?php
$sheme = $_SERVER["REQUEST_SCHEME"]; //for server
if (isset($_GET['info'])) phpinfo(); //for server

include_once("controller/indexController.php");
checkAjax();




?>

