<?php

use yii\db\Migration;

/**
 * Class m190521_095900_add_shop_products_label_and_show_in_index_fields
 */
class m190521_095900_add_shop_products_label_and_show_in_index_fields extends Migration
{
    public function up()
    {
        $this->addColumn('{{%shop_products}}', 'label', $this->smallInteger()->null()->defaultValue(0)->after('rating'));
        $this->addColumn('{{%shop_products}}', 'show_in_index', $this->boolean()->defaultValue(false)->after('label'));
    }

    public function down()
    {
        $this->dropColumn('{{%shop_products}}', 'label');
        $this->dropColumn('{{%shop_products}}', 'show_in_index');
    }
}
