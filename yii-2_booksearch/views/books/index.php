<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Books';
?>
<?php if ( !Yii::$app->user->isGuest ) { ?>
<?= Html::a('Add book', ['/books/create'], ['class'=>'btn btn-primary']) ?>
<?php } else{ ?>
    <div id="centertext"> Login to add/delete/update the books </div>


<?php } ?>
<br><br><br>


<?php $form = ActiveForm::begin([
    'id' => 'status',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>


<?= $form->field($model, 'name')?>
<?=$form->field($model, 'author')?>
<?=$form->field($model, 'from')?>
<?=$form->field($model, 'to')?>


<div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>






<br>
<br>
<div class="books-index">
    <table id="myTable" class="table tablesorter">
        <thead>
        <tr>
            <th >#</th>
            <th><a href="<?=Url::to(['/books/sortbyname'])?>"  >Name</a></th>
            <th>Preview</th>
            <th>Author</th>
            <th><a href="<?=Url::to(['/books/sortbydate'])?>" >Date book</a></th>
            <th><a href="<?=Url::to(['/books/sortbyupload'])?>" >Uploaded</a></th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
   <?php
   foreach ($dataProvider as $book){ ?>


       <tr id="<?="tr".$book->id?>">
           <th scope="row"><?= $book->id ?></th>
           <td><?= $book->name ?></td>
           <td>
               <div class="blokimg">
                   <div class="overlay" id="contenedor<?=$book->id?>">
                       <div class="overlay_container">
                           <a href="#close">
                               <img width="300%" src="<?=$book->preview?>"/>
                           </a>
                       </div>
                   </div>
                   <a href="#contenedor<?=$book->id?>">
                       <img src="<?=$book->preview?>" height="50px" id="imagenM1" />
                   </a>
               </div>
           </td>
           <td><?= $book->author->firstname." ".$book->author->lastname ?></td>
           <td><?= $book->date ?></td>
           <td><?= $book->date_create ?></td>
           <td>

               <a href="javascript:void(0)" onclick="modal('<?= $book->preview ?>','<?= $book->author->firstname." ".$book->author->lastname ?>','<?=$book->date ?>','<?= $book->name ?>')" >[просмотр]</a>
               <?php if ( !Yii::$app->user->isGuest ) { ?>
                    <?= Html::a('[ред]', ['/books/update','id' => $book->id]) ?>
                    <a href="javascript:void(0)" onclick="deleteProduct(<?=$book->id?>)" >[удалить]</a>  </td>
               <?php }?>
       </tr>









  <?php }
   ?>

   <div style="display: none;">
       <div class="box-modal" id="exampleModal">
           <div  class="box-modal_close arcticmodal-close"> Закрыть </div>
           <div id="divimg"><img id="modalimg" src="" style="width:90%;"></div>
           <div id="divtitle"><span id="modaltitle"> </span>  </div>
           <div id="divinf"><span id="modalauthor"> </span> <br> <span id="modaldate"> </span>  </div>
       </div>
   </div>
        </tbody>
    </table>

</div>
