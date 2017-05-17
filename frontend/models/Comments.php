<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $email
 * @property string $content
 * @property string $created_at
 * @property integer $active
 * @property integer $post_id
 * @property integer $parent_id
 *
 * @property Post $post
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'content', 'created_at', 'post_id'], 'required'],
            [['created_at'], 'safe'],
            [['email'], 'email'],
            [['active', 'post_id', 'parent_id'], 'integer'],
            [['email', 'content'], 'string', 'max' => 255],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'content' => 'Content',
            'created_at' => 'Created At',
            'active' => 'Active',
            'post_id' => 'Post ID',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
