<?php
/**
 * Created by PhpStorm.
 * User: niger
 * Date: 18.05.17
 * Time: 10:26
 */

namespace frontend\models;

use frontend\models\Comment;
use Yii;
use yii\base\Model;


class CommentForm extends Model
{
    public $action = null;

    public $parent_id = null;

    public $email;

    public $content;


    public function __construct($action = null)
    {
        $this->action = $action;
        parent::__construct();
    }


    public function rules()
    {
        return [
            [['parent_id', 'post_id'], 'integer'],
            [['content', 'email'], 'required'],
            [['content', 'email'], 'string', 'max' => 255],
            ['email' , 'email']
        ];
    }
    public function attributeLabels()
    {
        return [
            'email' => 'Ваш e-mail',
            'content' => 'Комментарий'
        ];
    }

    /**
     * Сохраняет комментарий.
     * @param Comment $comment модель комментария
     * @param array $data данные пришедшие из формы
     * @return bool
     */
    public function save(Comment $comment, array $data)
    {
        $isLoad = $comment->load([
            'parent_id' => $data['parent_id'],
            'email' => $data['email'],
            'content' => $data['content'],
            'created_at' => $data['created_at']
        ], '');
        return ($isLoad && $comment->save());
    }

}