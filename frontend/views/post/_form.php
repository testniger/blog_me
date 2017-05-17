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
        echo $form->field($model, 'updated_at')->textInput(['readonly' => true, 'value' => date('Y-m-d H:i')]);
    }else{
        echo $form->field($model, 'created_at')->textInput([ 'value' => date('Y-m-d H:i')]);
    } ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Написать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
