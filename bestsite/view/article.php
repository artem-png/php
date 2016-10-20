 <?php
        getArticle();
        global $article;
     
    ?>

<div id="titleAndDate" onclick="return {id:1}">
    <input type="hidden" id="getId" value=" <?= $article['id']?>" />
    <div id="title">
        <?= $article['title']?>
    </div>
    
    <div id ="date">
        <?= $article['date']?>
    </div>


</div>


<div id="content">
    <img class="img-thumbnail" src="/pictures/<?= $article['image']?>"  style="width:40%;float:left;
margin: 4px 20px 20px 0px;" />
    <p >
        
        <?= $article['content']?>
</p>







</div>