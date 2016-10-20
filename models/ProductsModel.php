<?php

function getLastProducts($count = null){
    
    $sql="SELECT * FROM products ORDER BY id DESC";
    if ($count){
        $sql .= " LIMIT {$count}";
        
    }
    
    $rs=mysql_query($sql);
    
    return createSmartyAsArray($rs);
    
}

function getProductsByCat($id){
    $id= intval($id);
    $sql = " Select * from products where category_id='{$id}'";
    
    $rs = mysql_query($sql);
    
    return createSmartyAsArray($rs);
}

function getProductById($id){
    $id= intval($id);
    $sql="SELECT * from products where id ='{$id}'";
    
    $rs= mysql_query($sql);
    return mysql_fetch_assoc($rs);
}

function getProductsFromArray($itemsIds){
    $str= implode($itemsIds,', ');
    $sql="SELECT * from products where id in ({$str})";
    $rs=mysql_query($sql);
    
    return createSmartyAsArray($rs);
    
}