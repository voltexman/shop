<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_email}}`.
 */
class m190418_124843_create_contact_email_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%contact_emails}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255)->notNull(),
        ], $tableOptions);


        $this->insert('{{%contact_emails}}', [
            'id' => 1,
            'email' => 'example@mail.com',
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%contact_emails}}');
    }
}
