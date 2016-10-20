<?php
    session_start();
    include_once("controller/account.php");
    if (isset($_GET['news']) ) {
        if (isset($_GET['id']))
            articleAction();
        else
            mainAction();
    }
    else if (isset($_GET['controller'])){
        if (isset($_GET['action'])){
            if ($_GET['action']=="new"){
                newAction();
            }
            else if ($_GET['action']=="signup"){
                signAction();
            }
            else if ($_GET['action']=="register"){
                registerCheck();
            }
            else if ($_GET['action']=="exit"){
                exitUser();
            }
            else if ($_GET['action']=="signupact"){
                signupAction();
            }
            else if ($_GET['action']=="comment"){
                makeComment();
            }
            else if ($_GET['action']=="seturl"){
                setUrl();
            }
            else
                mainAction();
            
        }
        else 
            mainAction();
        
    }
    else{
        mainAction(); 
    }


    function newAction(){
         require_once ("view/headerAndSideBar.php");
         require_once ("view/newUser.php");
         require_once ("view/footer.php");
        
    }

    function signAction(){
         require_once ("view/headerAndSideBar.php");
         require_once ("view/signUp.php");
         require_once ("view/footer.php");
    }



    function mainAction(){

        require_once ("view/headerAndSideBar.php");
        require_once ("view/content.php");
        require_once ("view/footer.php");
    }

    function articleAction(){

        require_once ("view/headerAndSideBar.php");
        require_once ("view/article.php");
        require_once ("view/comment.php");
        require_once ("view/commentsList.php");
        require_once ("view/footer.php");
    }

