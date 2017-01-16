<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>
<br>

<div style="width: 20% ; float: left ; height: 100px" ></div>
<div style="width: 60%; float: left">
    <h3> Для добавления внесите информацию в нижнее поле.<br>
    Для удаления удалите текст из трех полей одной строки.</h3>
    <br>
    <br>
    <table id="myTable" class="table table-striped">
        <thead >
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>

        </tr>
        </thead>

        <tbody>

        <?php foreach ($products as $product): ?>
            <!--      id       -->
            <tr id="stolb<?= $product->id ?>" >

                <th
                    id="id<?= $product->id ?>"
                >
                    <?= $product->id ?>
                </th>


<!--     name           -->

                <th id="name<?= $product->id ?>">

                    <input
                        id="inputName<?= $product->id ?>"
                        onchange="onChangeName(<?= $product->id ?>)"
                        size="40"
                        value="<?= $product->name ?>"
                    >

                </th>

<!--     category       -->

                <th id="category<?= $product->id ?>">

                    <input
                        id="inputCategory<?= $product->id ?>"
                        onchange="onChangeCategory(<?= $product->id ?>)"
                        value="<?= $product->category ?>"
                    >

                </th>

<!--         price       -->

                <th id="price<?= $product->id ?>">

                    <?php if ($product->price == null) {

                     ?>
                        <input
                            id="inputPrice<?= $product->id ?>"
                            onchange="onChangePrice(<?= $product->id ?>)"

                            value="">

                   <?php } else { ?>
                    <input
                        id="inputPrice<?= $product->id ?>"
                        onchange="onChangePrice(<?= $product->id ?>)"

                        value="<?=$product->price?>">

                   <?php } ?>

                </th>

            </tr>

        <?php endforeach; ?>



        <tr  >

            <th>
            </th>

            <th>
                <input  onchange="addNewByName()" id="newName" maxlength="25" size="40" value="">
            </th>

            <th>
                <input onchange="addNewByCategory()" id="newCategory" value="">
            </th>

            <th >
                <input
                    onchange="addNewByPrice()"
                    id="newPrice"
                    maxlength="25"
                    size="20"
                    value="">
            </th>

        </tr>



        </tbody>
    </table>
</div>




