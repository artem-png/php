<?php


Class Template {

    private $registry;

    private $vars = array();


    function __construct() {

        $this->registry = Registry::getInstance();

    }

    function showView($args){
        if ($args['view']=='error'){
           $this->showError();
        }
        else {
            $viewPath = "./views/" . $args['controller'] . "/" . $args['view'] . ".php";

            $var = (isset($args['args'])) ? $args['args'] : null;
            if (is_readable($viewPath) == false) {

               $this->showError();

            }
            else {
                include_once("./views/header/header.php");
                include_once($viewPath);
                include_once("./views/footer/footer.php");
            }
        }
    }

    function showError(){
        if (is_readable("./views/errors/error.php") == false) {

            die ('404 Not Found  ' );

        }
        else {
            include_once("./views/errors/error.php");
        }
    }


}

