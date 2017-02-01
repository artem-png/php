<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="loginForm"  style="">

<div id="title"> <h3>Login</h3></div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-3\">{label}</div>\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>


        <div class="form-group" style="text-align: center" >
            <div class=" col-lg-13">
                <?= Html::submitButton('LOGIN', ['class' => 'btn btn-secondary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>


</div>

<div id="regHref">
    <h3><a href="<?=Url::to(['/site/reg'])?>" style="color: #1f1f20">Registration</a></h3>
    <hr id="line" >

</div>


</div>