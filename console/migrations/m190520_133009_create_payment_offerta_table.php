<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_offerta}}`.
 */
class m190520_133009_create_payment_offerta_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%payment_offerta}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%payment_offerta}}', [
            'id' => 1,
            'title' => 'Офферта',
            'description' => 'Офферта описание',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%payment_offerta}}');
    }
}
