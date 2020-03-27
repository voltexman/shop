<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_rules}}`.
 */
class m190520_130444_create_payment_rules_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%payment_rules}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%payment_rules}}', [
            'id' => 1,
            'title' => 'Правила оплаты',
            'description' => 'Правила',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%payment_rules}}');
    }
}
