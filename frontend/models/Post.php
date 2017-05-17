<?php

namespace frontend\models;

use Yii;

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
 * @property Comments[] $comments
 */
class Post extends \yii\db\ActiveRecord
{
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
            'title' => 'Title',
            'alias' => 'Alias',
            'anons' => 'Anons',
            'content' => 'Content',
            'author' => 'Author',
            'priority' => 'Priority',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['post_id' => 'id']);
    }
}
