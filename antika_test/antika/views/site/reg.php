<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */


$this->title = 'Registration';

?>
<div id="loginForm"  >

    <div  id="title"> <h3>Registration</h3></div>
    <?php $form = ActiveForm::begin([
        'id' => 'reg-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-3\">{label}</div>\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'email')?>

    <?= $form->field($model, 'password')->passwordInput()?>


    <div class="form-group" style="text-align: center" >
        <div class="form-group">
            <?= Html::submitButton('REGISTER', ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>


</div>

<div id="regHref">
    <h3><a href="<?=Url::to(['/site/login'])?>" style="color: #1f1f20">Login</a></h3>
    <hr id="line"  >

</div>




</div><!-- main-reg -->