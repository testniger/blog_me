<?php

use yii\helpers\Html;
;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Написать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
    <?php
    foreach ($posts->models as $post) {
        echo $this->render('shortView', [
            'model' => $post
        ]);
    }
    ?>
    </div>


</div>

