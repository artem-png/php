<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Info';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contacts" style="">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to buy</p>

    <?php $form = ActiveForm::begin([
        'id' => 'contact-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label '],
        ],
    ]); ?>

        <?= $form->field($model, 'phone')->textInput(['autofocus' => true])->hint('Enter your phone for contact') ?>

        <?= $form->field($model, 'address')->textInput() ?>



        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('  BUY     ', ['class' => 'glyphicon glyphicon-ok btn btn-primary ', 'name' => 'buy-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

  
</div>
