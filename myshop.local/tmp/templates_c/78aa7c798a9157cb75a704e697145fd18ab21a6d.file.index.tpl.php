<?php /* Smarty version Smarty-3.1.22-dev, created on 2016-10-08 20:12:08
         compiled from "..\views\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2872957f77914573e82-35661880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78aa7c798a9157cb75a704e697145fd18ab21a6d' => 
    array (
      0 => '..\\views\\default\\index.tpl',
      1 => 1475950319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2872957f77914573e82-35661880',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_57f7791462f6a4_42606610',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f7791462f6a4_42606610')) {function content_57f7791462f6a4_42606610($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
    <div  style="float:  left; padding: 15px 15px 15px 15px;margin-right: 20px;text-align: center;" >
           <a  href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                <img  id="imageAndText" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="200" height="200"/>
            </a>
            <br>
            <a id="imageAndText" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" >
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                </p>
            </a>
    </div>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%4==0) {?>
        <div style="clear: both"></div>
        <?php }?>
<?php } ?>
         <?php }} ?>
