<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guarantee}}`.
 */
class m190522_073927_create_guarantee_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%guarantees}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%guarantees}}', [
            'id' => 1,
            'title' => 'Гарантии',
            'description' => 'description',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%guarantees}}');
    }
}
