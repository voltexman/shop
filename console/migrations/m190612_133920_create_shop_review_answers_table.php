<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_review_answers}}`.
 */
class m190612_133920_create_shop_review_answers_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_review_answers}}', [
            'id' => $this->primaryKey(),
            'review_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'text' => $this->text(),
            'created_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_review_answers-review_id}}', '{{%shop_review_answers}}', 'review_id');
        $this->addForeignKey('{{%fk-shop_review_answers-review_id}}', '{{%shop_review_answers}}', 'review_id', '{{%shop_reviews}}', 'id', 'CASCADE','RESTRICT');

        $this->createIndex('{{%idx-shop_review_answers-user_id}}', '{{%shop_review_answers}}', 'user_id');
        $this->addForeignKey('{{%fk-shop_review_answers-user_id}}', '{{%shop_review_answers}}', 'user_id', '{{%users}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
//        $this->dropForeignKey('{{%fk-shop_review_answers-review_id}}', '{{%shop_review_answers}}');
//        $this->dropForeignKey('{{%fk-shop_review_answers-review_id}}', '{{%shop_review_answers}}');

        $this->dropTable('{{%shop_review_answers}}');
    }
}
