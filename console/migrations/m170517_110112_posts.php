<?php

use yii\db\Migration;

class m170517_110112_posts extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'alias' => $this->string(128)->notNull()->unique(),
            'anons' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'author' => $this->string(255)->notNull(),
            'priority' => $this->integer(11)->notNull()->defaultValue(1),
            'active' => $this->integer(11)->notNull()->defaultValue(1),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime(),
        ]);
        $this->createIndex('idx-post-active','post', 'active');
        $this->createIndex('idx-post-priority','post', 'priority');
        $this->createIndex('idx-post-date','post', 'created_at');
    }

    public function down()
    {
        $this->dropIndex('idx-post-date','post');
        $this->dropIndex('idx-post-priority','post');
        $this->dropIndex('idx-post-active','post');

        $this->dropTable('post');
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
