<h1> Your cart </h1>

{if ! $rsProducts}
is empty...
{else}
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
    {foreach $rsProducts as $item name=products}
       <tr>
        <td> {$smarty.foreach.products.iteration} </td>
        <td> <a href="/product/{$item['id']}/">{$item['name']}&nbsp;&nbsp;&nbsp;</a></td>
        <td> 
           <input style="width:50px" name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrise({$item['id']});"/>
           </td>
        <td> 
            
            <span id="itemPrice_{$item['id']}" value="{$item['price']}">
            {$item['price']} &nbsp;&nbsp;&nbsp; 
           </span>
           
           </td>
           
           
           
        <td> 
           <span id="itemRealPrice_{$item['id']}">
                {$item['price']}
            </span>
           
           
           </td>
        <td> 
           

            <a id="removeCart_{$item['id']}" href="#" onClick="removeFromCart({$item['id']}); window.location.reload(true);">Remove</a> 
           
           </td>
       </tr> 

    {/foreach}
</table>
</br>

<h4 id ="totalPrice"  ></h4>
<script type="text/javascript">
    TotalPrice();
</script>

{/if}
