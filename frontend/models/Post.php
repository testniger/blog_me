<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $anons
 * @property string $content
 * @property string $author
 * @property integer $priority
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Comment[] $comments
 */
class Post extends \yii\db\ActiveRecord
{

    /**
     * Статус поста: опубликованн.
     */
    const POST_ACTIVE = '1';
    /**
     * Статус поста: черновие.
     */
    const POST_INACTIVE = '2';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias', 'anons', 'content', 'author', 'created_at'], 'required'],
            [['anons', 'content'], 'string'],
            [['author'], 'email'],
            [['priority', 'active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'author'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 128],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'alias' => 'Короткий url',
            'anons' => 'Краткое описание',
            'content' => 'Текст статьи',
            'author' => 'Автор',
            'priority' => 'Приоритет',
            'active' => 'Показывать',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Возвращает модель поста.
     * @param int $id
     * @throws NotFoundHttpException в случае, когда пост не найден или не опубликован
     * @return Post
     */
    public function getPost($id)
    {
        if (
            ($model = Post::findOne($id)) !== null &&
            $model->isPublished()
        ) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested post does not exist.');
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }

    /**
     * Возвращает опубликованные комментарии
     * @return ActiveDataProvider
     */
    public function getPublishedComments()
    {
        return new ActiveDataProvider([
            'query' => $this->getComments()
                ->where(['active' => Comment::COMMENTS_PUBLISH])
        ]);
    }



    /**
     * Возвращает опубликованные посты
     * @return ActiveDataProvider
     */
    public function getPublishedPosts()
    {
        return new ActiveDataProvider([
            'query' => Post::find()
                ->where(['active' => self::POST_ACTIVE])
                ->orderBy('priority DESC, created_at DESC')
        ]);
    }


    /**
     * Возвращает опубликован ли пост
     * @return bool
     */
    protected function isPublished()
    {
        return $this->active === self::POST_ACTIVE;
    }
}

