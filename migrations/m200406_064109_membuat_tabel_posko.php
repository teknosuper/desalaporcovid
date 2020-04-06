<?php

use yii\db\Migration;

/**
 * Class m200406_064109_membuat_tabel_posko
 */
class m200406_064109_membuat_tabel_posko extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posko', [
            'id' => $this->primaryKey(),
            'id_kelurahan' => $this->string(20)->defaultValue(null),
            'nama_posko' => $this->string(255)->defaultValue(null),
            'alamat_posko' => $this->string(255)->defaultValue(null),
            'email_posko' => $this->string(255)->defaultValue(null),
            'keterangan' => $this->text()->defaultValue(null),
            'status' => $this->integer(11)->defaultValue(null),
            'no_telepon' => $this->string(255)->defaultValue(null),
            'created_by' => $this->integer(11)->defaultValue(null),
            'created_at' => $this->datetime()->defaultValue(null),
            'updated_by' => $this->integer(11)->defaultValue(null),
            'updated_at' => $this->datetime()->defaultValue(null)
        ]);

        $this->addForeignKey('posko_kel_fk', 'posko', 'id_kelurahan', 'kelurahan', 'id_kel');
        $this->addForeignKey('posko_users_created_fk', 'posko', 'created_by', 'users', 'id');
        $this->addForeignKey('posko_users_updated_fk', 'posko', 'updated_by', 'users', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('posko');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_064109_membuat_tabel_posko cannot be reverted.\n";

        return false;
    }
    */
}
