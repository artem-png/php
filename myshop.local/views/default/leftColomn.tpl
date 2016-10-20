
        <div id="leftColumn">
            <div id="leftMenu">
                <div class="menuCaption">Menu:</div>
                    {foreach $rsCategories as $item}
                        <a href="/category/{$item['id']}/">{$item['name']}</a>
                        <br>
                        {if isset($item['children'])}
                        {foreach $item['children'] as $a}
                             --<a href="/category/{$a['id']}/">{$a['name']}</a>
                              <br>
                
                        {/foreach}
                        {/if}
                    {/foreach}
                
   
            </div>
{if isset($arUser)}
            
            
    <div  id="userBox">
        <a href="/user/" id="userLink">{$arUser['displayName']}</a><br/>
        <a href="/user/logout/" onlick="logout();">Exit</a>
    </div>
            
{else}
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
            
{/if}
            
            
            
            
            
            
            
            
            
            <br/>
            <br/>
            <div class="menuCaption"><h4 >Cart</h4></div>
            <a href="/cart/" title="Go to cart"><h4 >IN CART</a>
            <span id="cartCntItems">
                
                {if $cartCntItems>0  } {$cartCntItems} {else} Empty {/if}
                    </h4>
            </span>
        </div>