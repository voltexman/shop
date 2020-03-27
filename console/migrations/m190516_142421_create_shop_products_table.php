<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_products}}`.
 */
class m190516_142421_create_shop_products_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_products}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'price_old' => $this->integer()->null(),
            'price_new' => $this->integer()->notNull(),
            'description' => $this->text()->null(),
            'rating' => $this->decimal(3, 2),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'meta_json' => $this->text(),
            'status' => $this->smallInteger()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_products-code}}', '{{%shop_products}}', 'code', true);

        $this->createIndex('{{%idx-shop_products-category_id}}', '{{%shop_products}}', 'category_id');
        $this->createIndex('{{%idx-shop_products-brand_id}}', '{{%shop_products}}', 'brand_id');

        $this->addForeignKey('{{%fk-shop_products-category_id}}', '{{%shop_products}}', 'category_id', '{{%shop_categories}}', 'id');
        $this->addForeignKey('{{%fk-shop_products-brand_id}}', '{{%shop_products}}', 'brand_id', '{{%shop_brands}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%shop_products}}');
    }
}
