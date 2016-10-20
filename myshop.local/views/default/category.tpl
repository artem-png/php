<h1 style="text-align: center;">Category {$rsCategory['name']}</h1>
    {foreach $rsProducts as $item name=products}
        <div  id="imageAndText" style="float:left;padding:15px 15px 15px 15px;" >
            <a href="/product/{$item['id']}/">
                <img id="imageAndText" src="/images/products/{$item['image']}" width="200" height="200"/>
            </a> <br/>
            <a  href ="/product/{$item['id']}/"
               <p>{$item['name']}</p></a>
           </div> 
            {if $smarty.foreach.products.iteration mod 4 ==0}
                <div style="clear:both;"></div>
            {/if}
        {/foreach}
     {foreach $rsChildCats as $item name=childCats}
         <h2>
            <a href="/category/{$item['id']}/">{$item['name']}</a>
            </h2>   
      {/foreach}      
        