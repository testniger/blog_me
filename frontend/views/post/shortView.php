<?php
/**
 * Created by PhpStorm.
 * User: niger
 * Date: 17.05.17
 * Time: 17:34
 */
use yii\helpers\Html;

/* @var $model frontend\models\Post */
?>


<div class="col-md-4">
    <div class="card">
        <div class="card-header <?php if ($model->priority > 1) {echo 'bgm-red';}else{echo 'ch-alt';} ?>">
            <h2><?= $model->title ?></h2>
        </div>
        <div class="card-body card-padding">
            <p>Автор : <?= $model->author ?> Опубликована
                : <?= $model->created_at ?> </p>
            <p class="content">
                <?= $model->anons ?>
            </p>
            <?php if ($model->updated_at){echo '<div>Отредактирована:<strong>'. $model->updated_at.'</strong></div>';} ?>
            <?= Html::a('Подбронее', ['post/view', 'id' => $model->id], ['class' => 'btn btn-block btn-success']) ?>
        </div>

    </div>







</div>



