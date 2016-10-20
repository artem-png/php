<?php 
    getCommentsForArticle();
    global $comments;
    if ($comments){
    foreach ($comments as $item) {



?>

<div id="comments">
    <hr style=" margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #8a8a8a;">  
    <div ><p id="commentsLog"><?= $item['login'] ?></p></div>
    
    <div ><p id="commentsDate"><?= $item['date'] ?></p></div>
    <div ><p id="commentsContent"><?= nl2br($item['content']) ?></p></div>

</div>


<?php } } else { ?>
    <br/>
    <p id="commentsLog" >Коментарии отсутствуют.</p>



<?php } ?>