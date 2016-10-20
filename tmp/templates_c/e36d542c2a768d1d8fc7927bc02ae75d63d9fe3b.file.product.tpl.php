<?php /* Smarty version Smarty-3.1.22-dev, created on 2016-10-10 17:12:48
         compiled from "..\views\default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2292757fa1d698650a7-69714680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e36d542c2a768d1d8fc7927bc02ae75d63d9fe3b' => 
    array (
      0 => '..\\views\\default\\product.tpl',
      1 => 1476112366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2292757fa1d698650a7-69714680',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_57fa1d698b32b3_94478038',
  'variables' => 
  array (
    'rsProduct' => 0,
    'itemInCart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fa1d698b32b3_94478038')) {function content_57fa1d698b32b3_94478038($_smarty_tpl) {?><h3 id="imageAndText"> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
 </h3>
<div id="imageAndText">
<img  width="400" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
    </div>
<br/>
<h4>Cost : <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
  &nbsp; &nbsp; &nbsp;   <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme"<?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;">Add to chart</a> 

    <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); window.location.reload(true);">Delete from cart</a> 
   </h4> 
    
   


<p>Description :<br/> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }} ?>
