<?php

use yii\db\Migration;

/**
 * Class m200406_082756_membuat_tabel_logs
 */
class m200406_082756_membuat_tabel_logs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('logs', [
            'id_logs' => $this->primaryKey(),
            'user_id' => $this->integer(11)->defaultValue(null),
            'action' => $this->string(255)->defaultValue(null),
            'action_id' => $this->integer(11)->defaultValue(null),
            'data_serialize' => $this->text(),
            'created_at' => $this->datetime()->defaultValue(null)
        ]);

        $this->addForeignKey('logs_user_fk', 'logs', 'user_id', 'users', 'id');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('logs');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_082756_membuat_tabel_logs cannot be reverted.\n";

        return false;
    }
    */
}
