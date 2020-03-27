<?php

use yii\db\Migration;

/**
 * Class m190515_114015_add_users_phone_field
 */
class m190515_114015_add_users_phone_field extends Migration
{
    public function up()
    {
        $this->addColumn('{{%users}}', 'phone', $this->string()->null()->unique());
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'phone');
    }
}
