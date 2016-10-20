{foreach $rsProducts as $item  name=products}
    <div  style="float:  left; padding: 15px 15px 15px 15px;margin-right: 20px;text-align: center;" >
           <a  href="/product/{$item['id']}/">
                <img  id="imageAndText" src="/images/products/{$item['image']}" width="200" height="200"/>
            </a>
            <br>
            <a id="imageAndText" href="/product/{$item['id']}/" >
                <p>
                    {$item['name']}
                </p>
            </a>
    </div>
    {if $smarty.foreach.products.iteration mod 4 == 0}
        <div style="clear: both"></div>
        {/if}
{/foreach}
         