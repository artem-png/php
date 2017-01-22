<?php
function __autoload($class_name) {

    $filename = strtolower($class_name) . '.php';
    $file = site_path . 'classes' . DIRSEP . $filename;
    if (file_exists($file) == false) {
        return false;
    }
    include ($file);



}
$registry = Registry::getInstance();
$router = new Router();
$router->setPath (site_path . 'controllers');