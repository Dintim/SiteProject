<?php

use yii\db\Migration;

/**
 * Class m200112_184441_drop_column_img
 */
class m200112_184441_drop_column_img extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('post', 'img');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('post', 'img', $this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200112_184441_drop_column_img cannot be reverted.\n";

        return false;
    }
    */
}
