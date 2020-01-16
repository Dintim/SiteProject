<?php

use yii\db\Migration;

/**
 * Class m200116_144659_add_post_content_anounce
 */
class m200116_144659_add_post_content_anounce extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'anounce', $this->text());
        $this->addColumn('post', 'content', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('post', 'anounce');
        $this->dropColumn('post', 'content');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200116_144659_add_post_content_anounce cannot be reverted.\n";

        return false;
    }
    */
}
