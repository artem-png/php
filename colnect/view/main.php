<?php


?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/main.js"></script>

    <title>HTML Element Counter</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<div id="header">
    <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="#">Tagurl</a>

            </div>

        </div>
    </div>

</div>


<div id="mainDiv">

    <div id="inputDiv">
        <form>
            <div class="form-group">
                <label for="formGroupExampleInput">Url</label>
                <input type="text" class="form-control" id="inputUrl" placeholder="e.g. https://www.google.com.ua/">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Element</label>
                <input type="text" class="form-control" id="inputTag" placeholder="e.g. img or <img>">
            </div>

            <div id="buttonHolder">
                <button onclick="go()" type="button" class="btn btn-custom">Go</button>
            </div>
            <div id="errorDiv">
            <span id="error">   </span>
            </div>
        </form>

    </div>

    <br>
    <br>

    <div id="result">

        <div id="divInfo">
            <span id="countTag" > </span>
        </div>

        <div id="divInfo">
            <span id="workInformation"> </span>
        </div>

        <div id="divInfo">
            <span id="workTime"> </span>
        </div>
        <br>


        <div id="divInfo">
            <span id="domainPop"> </span>
        </div>

        <div id="divInfo">
            <span id="averageTime"> </span>
        </div>

        <div id="divInfo">
            <span id="tagFromUrl"> </span>
        </div>

        <div id="divInfo">
            <span id="totalTag"> </span>
        </div>


    </div>







</div>
<script>
    $("#inputTag").keyup(function(event){
        if(event.keyCode == 13){
            go();

        }
    });

    $("#inputUrl").keyup(function(event){
        if(event.keyCode == 13){
            go();

        }
    });


</script>


</body>
</html>