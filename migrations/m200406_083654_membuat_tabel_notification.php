<?php

use yii\db\Migration;

/**
 * Class m200406_083654_membuat_tabel_notification
 */
class m200406_083654_membuat_tabel_notification extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('notification', [
            'id' => $this->primaryKey(),
            'key' => $this->string(255)->notNull(),
            'key_id' => $this->string(255)->defaultValue(null),
            'type' => $this->string(255)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'seen' => $this->tinyInteger(1)->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'flashed' => $this->tinyInteger(1)->notNull()
        ]);

        $this->addForeignKey('notification_user_fk', 'notification', 'user_id', 'users', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('notification');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_083654_membuat_tabel_notification cannot be reverted.\n";

        return false;
    }
    */
}
