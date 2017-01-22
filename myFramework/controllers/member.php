<?php
include_once ("./classes/controllerbase.php");

Class Controller_Member Extends Controller_Base {


    function index() {

        return ['view'=> "index", 'args'=>[
            'title'=>"Artem"
        ]];

    }


    function view() {

        return ['view'=> "view", 'args'=>[
            'title'=>"Artem"
        ]];

    }


}



