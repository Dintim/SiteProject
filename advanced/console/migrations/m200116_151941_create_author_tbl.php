<?php

use yii\db\Migration;

/**
 * Class m200116_151941_create_author_tbl
 */
class m200116_151941_create_author_tbl extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200116_151941_create_author_tbl cannot be reverted.\n";

        return false;
    }
    */
}
