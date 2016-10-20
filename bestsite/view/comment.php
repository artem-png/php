<?php if (isset($_SESSION['user'])) {  ?>
<div id="commentBar">
    <?= $_SESSION['user']['login'] ?>
    <textarea id="contentComment"class="form-control" rows="4"></textarea>
    <br/>
    <button onclick="comment();" type="button" class="btn btn-primary">Готово</button>
    <p id="dangerComment"class="text-danger" value=""></p>
</div>
<?php  } 
else { ?>
 <p id="authNotification">Войдите в аккаунт, что бы иметь возможность комментировать.</p>
<?php } ?>
