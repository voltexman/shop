<?php

use yii\db\Migration;

/**
 * Class m181227_095801_add_user_roles
 */
class m181227_095801_add_user_roles extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('{{%auth_items}}', ['type', 'name', 'description'], [
            [1, 'admin', 'Admin'],
            [1, 'moderator', 'Moderator'],
            [1, 'user', 'User'],

        ]);

        $this->batchInsert('{{%auth_item_children}}', ['parent', 'child'], [
            ['admin','moderator'],
            ['moderator','user'],
        ]);

        $this->execute('INSERT INTO {{%auth_assignments}} (item_name, user_id) SELECT \'user\', u.id FROM {{%users}} u ORDER BY u.id');
    }

    public function down()
    {
        $this->delete('{{%auth_items}}', ['name' => ['admin', 'moderator', 'user']]);
    }
}
