<?php
    include_once ("./library/db.php");
    $idMenu=3;
    $rs = null;
    $article=null;
    $comments=null;

    function getCommentsForArticle(){
        global $comments;
        $id=intval($_GET['id']);
        $sql="SELECT * FROM comments where article_id=".$id." ORDER BY id DESC";
        $smartyRs=null;
        $rs=mysql_query($sql);
        if($rs){
        while ($row = mysql_fetch_assoc($rs)){
           
            $smartyRs[]=$row;
        }
        }
        else $comments=null;
        $comments=$smartyRs;
        
    }

    
    function getArticle(){
        global $article;
        $id=intval($_GET['id']);
        $sql="SELECT * FROM news where id=".$id;
        $article=mysql_query($sql);
        $article=mysql_fetch_assoc($article);
    }


    function getCountry(){
        global $idMenu;
        if ($idMenu == 1) return "rus";
        if ($idMenu == 2) return "ukr";
        if ($idMenu == 3) return "world";
        if ($idMenu == 4) return "sport";
    }

    
    function getIdCountry(){
        global $idMenu;
        if (isset ($_GET['news'])){
        $str=$_GET['news'];
        if ($str=="rus") $idMenu=1;
        else
        if ($str=="ukr") $idMenu=2;
        else
        if ($str=="world") $idMenu=3;
        else
        if ($str=="sport") $idMenu=4;
        }
        else $idMenu=3;
        return $idMenu;
    }


    function getNews(){
    
    

   

    if (isset($_GET['news'])){
        $str=$_GET['news'];
        if ($str=="rus") getOne();
        else
        if ($str=="ukr") getTwo();
        else
        if ($str=="world") getThree();
        else
        if ($str=="sport") getFour();
        else  getThree();
    }
    else{
        getThree();
    }
    }
    
    function getInfoFromDb(){
        global $idMenu,$rs;
        $sql = "SELECT * FROM news WHERE category={$idMenu}";
        $rs=mysql_query($sql);
        while ($row = mysql_fetch_assoc($rs)){
            $a=mb_substr($row['content'],0,70,'UTF-8');
            $row['intro']=$a;
            $smartyRs[]=$row;
        }
        $rs=$smartyRs;
       
       
    }

    function getOne(){
        global $idMenu;
        $idMenu=1;
        getInfoFromDb();
        
    }

    function getTwo(){
        global $idMenu;
        $idMenu=2;
        getInfoFromDb();
        
    }

    function getThree(){
       global $idMenu;
        $idMenu=3;
        getInfoFromDb();
        
    }

    function getFour(){
        global $idMenu;
        $idMenu=4;
        getInfoFromDb();
       
    }

    function d ($value = null, $die=1){
        echo 'Debug: <br/><pre>';
        print_r($value);
        echo '</pre>';
    
        if ($die) die;
    
}


    