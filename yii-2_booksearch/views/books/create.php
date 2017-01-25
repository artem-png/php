<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Books */

$this->title = 'Create Books';

?>
<div class="books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'status' => 'create',
    ]) ?>

</div>
