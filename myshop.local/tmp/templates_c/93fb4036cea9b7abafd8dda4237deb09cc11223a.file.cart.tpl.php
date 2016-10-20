<?php /* Smarty version Smarty-3.1.22-dev, created on 2016-10-09 19:48:32
         compiled from "..\views\default\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1687557fa74d844dad3-94438846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93fb4036cea9b7abafd8dda4237deb09cc11223a' => 
    array (
      0 => '..\\views\\default\\cart.tpl',
      1 => 1476035310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1687557fa74d844dad3-94438846',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_57fa74d844dad4_08658100',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fa74d844dad4_08658100')) {function content_57fa74d844dad4_08658100($_smarty_tpl) {?><h1> Your cart </h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
is empty...
<?php } else { ?>
  <h2>Info </h2>
<table id="orderTable">
    <tr>
        <td># &nbsp;&nbsp;&nbsp;</td>
        <td>Name&nbsp;&nbsp;&nbsp; </td>
        <td>Quantity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
        <td>Cost for 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
        <td>Total cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>Moves &nbsp;&nbsp;&nbsp;</td>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
       <tr>
        <td> <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
 </td>
        <td> <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
&nbsp;&nbsp;&nbsp;</a></td>
        <td> 
           <input style="width:50px" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrise(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/>
           </td>
        <td> 
            
            <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 &nbsp;&nbsp;&nbsp; 
           </span>
           
           </td>
           
           
           
        <td> 
           <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

            </span>
           
           
           </td>
        <td> 
           

            <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); window.location.reload(true);">Remove</a> 
           
           </td>
       </tr> 

    <?php } ?>
</table>
</br>

<h4 id ="totalPrice"  ></h4>
<?php echo '<script'; ?>
 type="text/javascript">
    TotalPrice();
<?php echo '</script'; ?>
>

<?php }?>
<?php }} ?>
