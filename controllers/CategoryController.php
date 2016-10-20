<?php

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function indexAction($smarty){
    $rsChildCats=null;
    $rsProducts=null;
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($catId==null) exit();
    
    $rsCategory = getCatById($catId);
    
    if ($rsCategory==null) {
        header('Location:http://myshop.local');
        exit;
    }
    
    if ($rsCategory['parent_id'] == 0)
        $rsChildCats= getChildrenForCat($catId);
    else
        $rsProducts = getProductsByCat($catId);
    
    $rsCategories= getAllMainCatsWithChildren();
    
    $smarty->assign('pageTitle', 'Category '.$rsCategory['name']);
     $smarty->assign('rsCategory',$rsCategory);
     $smarty->assign('rsProducts',$rsProducts);
     $smarty->assign('rsChildCats',$rsChildCats);
     $smarty->assign('rsCategories',$rsCategories);
    
    loadTemplate($smarty,'header');
    loadTemplate($smarty,'category');
    loadTemplate($smarty,'footer');
    
   
}