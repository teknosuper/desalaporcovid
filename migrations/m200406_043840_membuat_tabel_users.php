<?php

use yii\db\Migration;

/**
 * Class m200406_043840_membuat_tabel_users
 */
class m200406_043840_membuat_tabel_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->defaultValue(null),
            'authKey' => $this->string(32)->defaultValue(null),
            'password' => $this->string()->defaultValue(null),
            'email' => $this->string(255)->defaultValue(null),
            'accessToken' => $this->string(32)->defaultValue(null),
            'userType' => $this->string(50)->defaultValue(null),
            'user_id' => $this->integer(11)->defaultValue(null),
            'status' => $this->integer(11)->defaultValue(null),
            'nama' => $this->string(255)->defaultValue(null),
            'kelurahan' => $this->string(20)->defaultValue(null),
            'alamat' => $this->string(255)->defaultValue(null),
            'no_telepon' => $this->string(20)->defaultValue(null),
            'gender' => $this->string(2)->defaultValue(null),
            'tanggal_lahir' => $this->date()->defaultValue(null),
            'tempat_lahir' => $this->string(255)->defaultValue(null),
            'created_at' => $this->datetime()->defaultValue(null),
            'created_by' => $this->integer(11)->defaultValue(null),
            'updated_at' => $this->datetime()->defaultValue(null),
            'updated_by' => $this->integer(11)->defaultValue(null)
        ]);

        $this->addForeignKey('users_created_fk', 'users', 'created_by', 'users', 'id');
        $this->addForeignKey('users_updated_fk', 'users', 'updated_by', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_043840_membuat_tabel_users cannot be reverted.\n";

        return false;
    }
    */
}
