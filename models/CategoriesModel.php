<?php

//Model for category table

function getAllMainCatsWithChildren(){
    $sql = 'select * from categories where parent_id=0';
    
    $rs= mysql_query($sql);
    
    $smartyRs=array();
    while ($row = mysql_fetch_assoc($rs)){
        
        $rsChildren=getChildrenForCat($row['id']);
        if ($rsChildren){
            $row['children'] = $rsChildren;
        }
      $smartyRs[]=$row; 
    }
    return $smartyRs;
    
}

function getChildrenForCat($id){
    
    $sql = "select * from categories where parent_id='{$id}'";
    
    $rs= mysql_query($sql);
    
    return createSmartyAsArray($rs);
    
}

function getCatById($id){
    
    $id = intval($id);
    $sql="select * from categories where id='{$id}'";
    
    $rs= mysql_query($sql);
    
    return mysql_fetch_assoc($rs);
}