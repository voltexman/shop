<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_reviews}}`.
 */
class m190612_132239_create_shop_reviews_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_reviews}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'user_id' => $this->integer()->notNull(),
            'vote' => $this->integer(),
            'text' => $this->text()->notNull(),
            'active' => $this->boolean()->notNull(),
            'created_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_reviews-product_id}}', '{{%shop_reviews}}', 'product_id');
        $this->addForeignKey('{{%fk-shop_reviews-product_id}}', '{{%shop_reviews}}', 'product_id', '{{%shop_products}}', 'id', 'CASCADE', 'RESTRICT');

        $this->createIndex('{{%idx-shop_reviews-user_id}}', '{{%shop_reviews}}', 'user_id');
        $this->addForeignKey('{{%fk-shop_reviews-user_id}}', '{{%shop_reviews}}', 'user_id', '{{%users}}', 'id', 'CASCADE', 'RESTRICT');

    }

    public function down()
    {
//        $this->dropForeignKey('{{%fk-shop_reviews-product_id}}', '{{%shop_reviews}}');
//        $this->dropForeignKey('{{%fk-shop_reviews-user_id}}', '{{%shop_reviews}}');

        $this->dropTable('{{%shop_reviews}}');
    }
}
