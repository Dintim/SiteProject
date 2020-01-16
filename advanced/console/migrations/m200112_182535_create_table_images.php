<?php

use yii\db\Migration;

/**
 * Class m200112_182535_create_table_images
 */
class m200112_182535_create_table_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->integer(),
            'name'=>$this->string(),           
            'PRIMARY KEY(id)', 
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200112_182535_create_table_images cannot be reverted.\n";

        return false;
    }
    */
}
