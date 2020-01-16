<?php

use yii\db\Migration;

/**
 * Class m200112_184750_add_column_file
 */
class m200112_184750_add_column_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'file_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('post', 'file_name');     
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200112_184750_add_column_file cannot be reverted.\n";

        return false;
    }
    */
}
