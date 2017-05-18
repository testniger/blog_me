<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Comments;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

use frontend\models\CommentForm;
use yii\helpers\Url;


class CommentsController extends Controller
{

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),

        ]);
    }


    public function actionAdd()
    {
        $model = new Comments();
        $commentForm = new CommentForm(Url::to(['comments/add', 'id' => Yii::$app->request->get('id')]));
        $model->post_id = Yii::$app->request->get('id');
        if ($commentForm->save($model, Yii::$app->request->post('CommentForm'))) {
            return $this->redirect(['post/view', 'id' => Yii::$app->request->get('id')]);
        } else {
            return $this->render('create', [
                'model' => $commentForm
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
