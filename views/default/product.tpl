<h3 id="imageAndText"> {$rsProduct['name']} </h3>
<div id="imageAndText">
<img  width="400" src="/images/products/{$rsProduct['image']}">
    </div>
<br/>
<h4>Cost : {$rsProduct['price']}  &nbsp; &nbsp; &nbsp;   <a id="addCart_{$rsProduct['id']}"  {if  $itemInCart} class="hideme"{/if} href="#" onClick="addToCart({$rsProduct['id']}); return false;">Add to chart</a> 

    <a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart} class="hideme" {/if} href="#" onClick="removeFromCart({$rsProduct['id']}); window.location.reload(true);">Delete from cart</a> 
   </h4> 
    
   


<p>Description :<br/> {$rsProduct['description']}</p>