<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = 'History';
?>


<?php

if (count($cart)<1){ ?>
    <h1 class="display-4" >History is empty.</h1>
<?php } else {  ?>



    <div class="site-cart" >
        <table class="table " >
            <thead class="thead-default">
            <tr>
                <th>id</th>
                <th>user_id</th>
                <th>date</th>
                <th>phone</th>
                <th>address</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $a=0;
            for ($i=0;$i<count($cart);$i++){
                if ($cart[$i]->shown == 0){?>
                    <tr  id="string<?=$i?>" class="tableGreen" >
                <?php } else { ?>
                    <tr  >
                <?php } ?>


                    <th scope="row"><?= 10000-$cart[$i]->id ?></th>

                    <td>

                        <?= $cart[$i]->user ?>

                    </td>


                    <td>

                        <?= $cart[$i]->date ?>

                    </td>





                    <td>
                        <?= $cart[$i]->phone ?>
                    </td>




                    <td>
                        <?= $cart[$i]->address ?>
                    </td>





                    <td>
                        <a href="<?= Url::to(['/site/purchaseadm', 'id' => $cart[$i]->id])?>" > Show  </a>
                        <?php if ($cart[$i]->shown == 0){?>
                        <a id="confirm<?=$i?>"    onclick="confirmAdmin(<?= $cart[$i]->id ?>,<?= $i ?>)" > Confirm </a>
                        <?php } ?>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>

    <div class="linkPage">
        <?= LinkPager::widget(['pagination' => $pagination, 'prevPageLabel'=>'Back', 'nextPageLabel' => 'Next']) ?>

    </div>
<?php } ?>