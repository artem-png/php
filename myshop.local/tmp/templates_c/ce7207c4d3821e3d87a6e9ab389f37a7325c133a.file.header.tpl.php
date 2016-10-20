<?php /* Smarty version Smarty-3.1.22-dev, created on 2016-10-09 15:12:47
         compiled from "..\views\default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2767357f78b632b2ea7-82715100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce7207c4d3821e3d87a6e9ab389f37a7325c133a' => 
    array (
      0 => '..\\views\\default\\header.tpl',
      1 => 1476018766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2767357f78b632b2ea7-82715100',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_57f78b6331c630_63359003',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f78b6331c630_63359003')) {function content_57f78b6331c630_63359003($_smarty_tpl) {?><html>  
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
/css/main.css" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <?php echo '<script'; ?>
 type="text/javascript" src='/js/jquery-3.1.1.js'><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src='/js/main.js'><?php echo '</script'; ?>
>
        
        
    
    </head>
    <body>
    <div>
        <div id="header" >
            <h1><a href="http://myshop.local" >My shop - internet shop </a></h1>
        </div>
        
        
        <?php echo $_smarty_tpl->getSubTemplate ('leftColomn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
           
        <div id="centerColumn" class="container">
            
            
        
         

        
      <?php }} ?>
