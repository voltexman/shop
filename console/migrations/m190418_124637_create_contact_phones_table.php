<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_phones}}`.
 */
class m190418_124637_create_contact_phones_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%contact_phones}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->insert('{{%contact_phones}}', [
            'id' => 1,
            'text' => '+380 00 00 00 000',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%contact_phones}}');
    }
}
