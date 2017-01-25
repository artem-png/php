<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(['id' => 'blog-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?php if ($status=="update") { ?>
        <br>
        (If empty,saves last image)
    <?php }?>
    <?= $form->field($model, 'preview')->fileInput(); ?>

    <?= $form->field($model, 'date')->textInput() ?>
    <?php if ($status=="update") { ?>
        <?= $form->field($model, 'authorname')->textInput(['value' => $model->author->firstname." ".$model->author->lastname]) ?>
    <?php } else {  ?>
        <?= $form->field($model, 'authorname')->textInput() ?>
    <?php }?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
