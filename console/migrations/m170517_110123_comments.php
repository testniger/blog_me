<?php

use yii\db\Migration;

class m170517_110123_comments extends Migration
{
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255)->notNull(),
            'content' => $this->string()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'active' =>  $this->integer(11)->notNull()->defaultValue(0),
            'post_id' => $this->integer()->notNull(),
            'parent_id' =>$this->integer()->defaultValue(0),
        ]);
        $this->createIndex('idx-comments-post-id','comments','post_id');
        $this->createIndex('idx-comments-date','comments','created_at');
        $this->createIndex('idx-comments-active','comments','active');
        $this->addForeignKey('FK-commets-post', 'comments','post_id','post','id');
    }

    public function down()
    {
        $this->dropForeignKey('FK-commets-post','comments');
        $this->dropIndex('idx-comments-active','comments');
        $this->dropIndex('idx-comments-date','comments');
        $this->dropIndex('idx-comments-post-id','comments');
        $this->dropTable('comments');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
