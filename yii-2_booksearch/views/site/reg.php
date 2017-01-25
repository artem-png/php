<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */


$this->title = 'Registration';

?>

<h1><?= Html::encode($this->title) ?></h1>
<br>

<div class="main-reg" >

    <?php $form = ActiveForm::begin([
        'id' => 'reg-form',

        'fieldConfig' => [

            'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
    ]); ?>
<div style="width:40%">
    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'email')?>

    <?= $form->field($model, 'password')?>
</div>

    <div class="form-group">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>




</div><!-- main-reg -->