<?php


Class Router
{

    private $registry;

    private $path;

    private $args = array();


    function __construct()
    {

        $this->registry = Registry::getInstance();

    }


    function setPath($path)
    {

        $path = trim($path, '/\\');

        $path .= DIRSEP;


        if (is_dir($path) == false) {

            throw new Exception ('Invalid controller path: `' . $path . '`');

        }


        $this->path = $path;

    }

    function delegate()
    {

        // Анализируем путь


        $this->getController($file, $controller, $action, $args);

        $controllerName=$controller;

        if (is_readable($file) == false) {

            die ('404 Not Found controller '.$controller);

        }


        // Подключаем файл

        include_once ($file);

        // Создаём экземпляр контроллера

        $class = 'Controller_' . $controller;

        $controller = new $class($this->registry);


        // Действие доступно?

        if (is_callable(array($controller, $action)) == false) {

            die ('404 Not Found method "'.$action.'" of controller '.$controllerName);

        }


        // Выполняем действие
        include_once ("template.php");
        $arg=$controller->$action();
        $arg['controller']=$controllerName;
        Registry::getInstance()['template']->showView($arg);

    }

    private function getController(&$file, &$controller, &$action, &$args)
    {

        $route = (empty($_GET['route'])) ? '' : $_GET['route'];


        if (empty($route)) {
            $route = 'index';

        }


        // Получаем раздельные части

        $route = trim($route, '/\\');

        $parts = explode('/', $route);


        // Находим правильный контроллер

        $cmd_path = $this->path;

        foreach ($parts as $part) {

            $fullpath = $cmd_path . $part;


            // Есть ли папка с таким путём?

            if (is_dir($fullpath)) {

                $cmd_path .= $part . DIRSEP;

                array_shift($parts);

                continue;

            }



            if (is_file($fullpath . '.php')) {

                $controller = $part;

                array_shift($parts);

                break;

            }

        }


        if (empty($controller)) {
            $controller = 'index';
        };


        // Получаем действие

        $action = array_shift($parts);

        if (empty($action)) {
            $action = 'index';
        }


        $file = "./controllers/". $controller . '.php';

        $args = $parts;

    }



}

