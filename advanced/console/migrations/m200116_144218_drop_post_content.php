<?php

use yii\db\Migration;

/**
 * Class m200116_144218_drop_post_content
 */
class m200116_144218_drop_post_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('post', 'content');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('post', 'content', $this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200116_144218_drop_post_content cannot be reverted.\n";

        return false;
    }
    */
}
