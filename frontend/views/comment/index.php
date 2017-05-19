<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php foreach ($model as $comments){ ?>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header <?php if ($comments['active']==1) { echo 'ch-alt';}else{ echo 'bgm-red';} ?>">
                    <h2><?= $comments['email']?></h2>
                    <small><?= $comments['created_at'] ?></small>
                </div>
                <div class="card-body card-padding">
                    <?= $comments['content']; ?>
                    <?= Html::a('Подбронее', ['comment/view', 'id' => $comments->id], ['class' => 'btn btn-block btn-success']) ?>
                </div>
            </div>

        </div>


   <?php }?>
</div>
