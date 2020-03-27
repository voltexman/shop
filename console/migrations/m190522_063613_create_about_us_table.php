<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%about_us}}`.
 */
class m190522_063613_create_about_us_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%about_us}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%about_us}}', [
            'id' => 1,
            'title' => 'О нас',
            'description' => 'description',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%about_us}}');
    }
}
