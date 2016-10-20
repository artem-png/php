<?php /* Smarty version Smarty-3.1.22-dev, created on 2016-10-08 20:56:16
         compiled from "..\views\default\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2416757f9312ec4b1a5-80619498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68da599f107daa9148f75e5c93a60782405efa0c' => 
    array (
      0 => '..\\views\\default\\category.tpl',
      1 => 1475952972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2416757f9312ec4b1a5-80619498',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_57f9312ecbc644_28055808',
  'variables' => 
  array (
    'rsCategory' => 0,
    'rsProducts' => 0,
    'item' => 0,
    'rsChildCats' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f9312ecbc644_28055808')) {function content_57f9312ecbc644_28055808($_smarty_tpl) {?><h1 style="text-align: center;">Category <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h1>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
        <div  id="imageAndText" style="float:left;padding:15px 15px 15px 15px;" >
            <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                <img id="imageAndText" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="200" height="200"/>
            </a> <br/>
            <a  href ="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"
               <p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p></a>
           </div> 
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%4==0) {?>
                <div style="clear:both;"></div>
            <?php }?>
        <?php } ?>
     <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsChildCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
         <h2>
            <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            </h2>   
      <?php } ?>      
        <?php }} ?>
