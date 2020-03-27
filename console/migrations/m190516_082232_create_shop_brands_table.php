<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_brands}}`.
 */
class m190516_082232_create_shop_brands_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_brands}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'show_in_index' => $this->boolean()->defaultValue(false),
            'image' => $this->string(255),
            'meta_json' => $this->text(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_brands}}');
    }
}
