<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_socs}}`.
 */
class m190418_124751_create_contact_socs_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%contact_socs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'link' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->insert('{{%contact_socs}}', [
            'id' => 1,
            'name' => 'viber',
            'link' => 'viber_phone',
        ]);

        $this->insert('{{%contact_socs}}', [
            'id' => 2,
            'name' => 'telegram',
            'link' => 'telegram_username',
        ]);

        $this->insert('{{%contact_socs}}', [
            'id' => 3,
            'name' => 'youtube',
            'link' => 'http://youtube.com',
        ]);

        $this->insert('{{%contact_socs}}', [
            'id' => 4,
            'name' => 'instagram',
            'link' => 'http://instagram.com',
        ]);

        $this->insert('{{%contact_socs}}', [
            'id' => 5,
            'name' => 'facebook',
            'link' => 'http://facebook.com',
        ]);

    }

    public function down()
    {

        $this->dropTable('{{%contact_socs}}');
    }
}
