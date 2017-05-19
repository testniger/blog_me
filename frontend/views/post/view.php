<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Comment;
/* @var $this yii\web\View */
/* @var $model frontend\models\Post */
/** @var \frontend\models\Comment $comment */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="t-view" data-tv-type="text">
    <div class="tv-header media">

        <div class="media-body p-t-5">
            <div> <?= htmlspecialchars($model->author) ?></div>
            <small class="c-gray"><?= htmlspecialchars($model->created_at) ?></small>
        </div>

        <ul class="actions m-t-20 hidden-xs">
            <li>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить пост?',
                        'method' => 'post',
                    ],
                ]) ?>

            </li>
        </ul>
    </div>
    <div class="tv-body">
    <h1><h1><?= Html::encode($this->title) ?></h1></h1>
        <div class="post">
            <?= htmlspecialchars($model->content) ?>
        </div>

        <div class="clearfix"></div>

        <ul class="tvb-stats">
            <li class="tvbs-comments">Количество комментариев : <?= count($model->getPublishedComments()->models);?></li>
        </ul>


    </div>

    <li class="tv-comments">
        <ul class="tvc-lists">
            <?php foreach($model->getPublishedComments()->models as $comment) : ?>
                <li class="media">
                    <div class="media-body">
                    <div><?= htmlspecialchars($comment->email) ?></div>
                    <small class="c-gray"><?= htmlspecialchars($comment->created_at) ?></small>
                    <div  class="m-t-10"><?= htmlspecialchars($comment->content) ?></div>
                    </div>
                </li>
            <?php endforeach; ?>



        </ul>
    </li>
    <?= $this->render('../comment/_form', [
        'model' => $commentForm
    ]) ?>

    </div>
</div>