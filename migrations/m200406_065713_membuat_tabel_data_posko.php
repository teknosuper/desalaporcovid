<?php

use yii\db\Migration;

/**
 * Class m200406_065713_membuat_tabel_data_posko
 */
class m200406_065713_membuat_tabel_data_posko extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('data_posko', [
            'id' => $this->primaryKey(),
            'nik' => $this->string(255)->defaultValue(null),
            'nama_warga' => $this->string(255)->defaultValue(null),
            'kelurahan' => $this->string(11)->defaultValue(null),
            'alamat' => $this->string(500)->defaultValue(null),
            'no_telepon' => $this->string(255)->defaultValue(null),
            'jenis_laporan' => $this->integer(11)->defaultValue(null),
            'kota_asal' => $this->string(255)->defaultValue(null),
            'kelurahan_datang' => $this->string(255)->defaultValue(null),
            'status' => $this->integer(11)->defaultValue(null),
            'keterangan' => $this->text(),
            'id_posko' => $this->integer(11)->defaultValue(null),
            'luar_negeri' => $this->integer(11)->defaultValue(null),
            'id_negara' => $this->string(11)->defaultValue(null),
            'waktu_datang' => $this->datetime()->defaultValue(null),
            'gender' => $this->string(2)->defaultValue(null),
            'tanggal_lahir' => $this->date()->defaultValue(null),
            'usia' => $this->integer(11)->defaultValue(null),
            'tempat_lahir' => $this->string(255)->defaultValue(null),
            'created_at' => $this->datetime()->defaultValue(null),
            'created_by' => $this->integer(11)->defaultValue(null),
            'updated_at' => $this->datetime()->defaultValue(null),
            'updated_by' => $this->integer(11)->defaultValue(null)

        ]);

        $this->addForeignKey('data_posko_fk', 'data_posko', 'id_posko', 'posko', 'id');
        $this->addForeignKey('data_posko_created_fk', 'data_posko', 'created_by', 'users', 'id');
        $this->addForeignKey('data_posko_updated_fk', 'data_posko', 'updated_by', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('data_posko');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_065713_membuat_tabel_data_posko cannot be reverted.\n";

        return false;
    }
    */
}
