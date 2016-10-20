<?php





function loadPage($smarty,$controllerName,$actionName='index')
    {
        include_once PathPrefix . $controllerName. PathPostfix;
        
        $function=$actionName.'Action';
    
        $function($smarty);
        
        
    }

function loadTemplate($smarty,$templateName){
    
    $smarty->display($templateName.TemplatePostfix);
    
    
}

function d ($value = null, $die=1){
    echo 'Debug: <br/><pre>';
    print_r($value);
    echo '</pre>';
    
    if ($die) die;
    
}

function createSmartyAsArray($rs){
    if (! $rs) return false;
    
    $smartyRs=array();
    
    while ($row = mysql_fetch_assoc($rs)){
        $smartyRs[]=$row;
    }
    
    return $smartyRs;
    
    
}

function redirect($addr){
    
    if (!$addr) $addr='/';
    header("Location: {$addr}");
    exit();
    
}

