<?php
include_once ("./classes/controllerbase.php");

Class Controller_Index Extends Controller_Base {


    function index() {

        return ['view'=> "index", 'args'=>[
            'title'=>"Artem"
        ]];


    }


}


