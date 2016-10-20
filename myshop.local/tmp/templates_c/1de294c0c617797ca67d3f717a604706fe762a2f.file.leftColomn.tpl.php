<?php /* Smarty version Smarty-3.1.22-dev, created on 2016-10-11 20:37:52
         compiled from "..\views\default\leftColomn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2172657f78b63337bb4-76618914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1de294c0c617797ca67d3f717a604706fe762a2f' => 
    array (
      0 => '..\\views\\default\\leftColomn.tpl',
      1 => 1476211069,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2172657f78b63337bb4-76618914',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_57f78b6333ba40_65116190',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'a' => 0,
    'arUser' => 0,
    'cartCntItems' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f78b6333ba40_65116190')) {function content_57f78b6333ba40_65116190($_smarty_tpl) {?>
        <div id="leftColumn">
            <div id="leftMenu">
                <div class="menuCaption">Menu:</div>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                        <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                        <br>
                        <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                        <?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
                             --<a href="/category/<?php echo $_smarty_tpl->tpl_vars['a']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['a']->value['name'];?>
</a>
                              <br>
                
                        <?php } ?>
                        <?php }?>
                    <?php } ?>
                
   
            </div>
<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
            
            
    <div  id="userBox">
        <a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br/>
        <a href="/user/logout/" onlick="logout();">Exit</a>
    </div>
            
<?php } else { ?>
    <div id="loginBox">
        <div id="imageAndText" class="menuCaption ">Autorization</div>
        <input type="text" id="loginEmail" name="loginEmail" value=""/><br/>
        <input type="password"  id="loginPwd" name="loginPwd" value=""/><br/>
        <input type="button" onclick="login(); window.location.reload(true);" value="Enter"/>
            
    </div>
            
            
          <div id="registerBox">
            <div class="menuCaption showHidden" id="imageAndText" onclick="showRegisterBox();">Registration</div>
              
              <div id="registerBoxHidden">
              email:<br>
                <input type="text" id="email" name="email" value=""/><br/>
                password:<br/>
                <input type="password" id="pwd1" name="pwd1" value=""/><br/>
                repeat password:<br>
                <input type="password" id="pwd2" name="pwd2" value=""/><br/>
                <input type="button" onclick="registerNewUser(); window.location.reload(true);" value="Register"/>
              
              
              
              
              </div>
            

            
            </div>  
            
<?php }?>
            
            
            
            
            
            
            
            
            
            <br/>
            <br/>
            <div class="menuCaption"><h4 >Cart</h4></div>
            <a href="/cart/" title="Go to cart"><h4 >IN CART</a>
            <span id="cartCntItems">
                
                <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php } else { ?> Empty <?php }?>
                    </h4>
            </span>
        </div><?php }} ?>
