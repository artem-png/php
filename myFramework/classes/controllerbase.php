<?php


Abstract Class Controller_Base {

    protected $registry;


    function __construct() {

        $this->registry = Registry::getInstance();

    }


    abstract function index();

}

