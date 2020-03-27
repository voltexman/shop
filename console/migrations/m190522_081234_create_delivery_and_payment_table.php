<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%delivery_and_payment}}`.
 */
class m190522_081234_create_delivery_and_payment_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%delivery_and_payment}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%delivery_and_payment}}', [
            'id' => 1,
            'title' => 'Доставка и оплата',
            'description' => 'description',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%delivery_and_payment}}');
    }
}
