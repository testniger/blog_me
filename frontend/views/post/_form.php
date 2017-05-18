<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model frontend\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anons')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 7]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
    <?php $model->active = 1; $model->priority = 1 ?>
    <?= $form->field($model, 'priority')->radioList([
        1 => 'Обычный пост',
        2 => 'Платный пост',
        3 => 'Премиальный пост'
    ]); ?>

    <?= $form->field($model, 'active')->radioList([
        1 => 'Показывать пост',
        2 => 'Скрыть пост'

    ]); ?>

    <?php if (!$model->isNewRecord){
        echo $form->field($model, 'updated_at')->hiddenInput(['value' => date('Y-m-d H:i')])->label(false);
    }else{
        echo $form->field($model, 'created_at')->hiddenInput([ 'value' => date('Y-m-d H:i')])->label(false);
    } ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Написать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
