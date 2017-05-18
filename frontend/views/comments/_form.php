<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

/* @var \frontend\models\CommentForm $model */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p-20">

    <?php
    $form = ActiveForm::begin(['action' => $model->action]);
    ?>

    <?= $form->field($model, 'parent_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'created_at')->hiddenInput([ 'value' => date('Y-m-d H:i')])->label(false); ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'content')->textarea(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton( 'Написать комментарий', ['class' => 'm-t-15 btn btn-primary btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
