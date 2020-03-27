<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_keys}}`.
 */
class m190517_144429_create_payment_keys_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%payment_keys}}', [
            'id' => $this->primaryKey(),
            'private_key' => $this->string()->notNull(),
            'public_key' => $this->string()->notNull(),
        ], $tableOptions);

        $this->insert('{{%payment_keys}}', [
            'id' => 1,
            'private_key' => 'XXXX',
            'public_key' => 'XXXX',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%payment_keys}}');
    }
}
