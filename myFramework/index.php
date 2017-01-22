<?php
error_reporting (E_ALL);
define ('DIRSEP', DIRECTORY_SEPARATOR);
$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP . "myFramework". DIRSEP;
define ('site_path', $site_path);

include_once ("includes/startup.php");

$db = new PDO('mysql:host=localhost;dbname=mvc', 'root', '');
$registry->set ('db', $db);
$registry->set ('router', $router);
$template = new Template();

$registry->set ('template', $template);
$router->delegate();




