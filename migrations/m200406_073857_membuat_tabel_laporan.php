<?php

use yii\db\Migration;

/**
 * Class m200406_073857_membuat_tabel_laporan
 */
class m200406_073857_membuat_tabel_laporan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('laporan', [
            'id' => $this->primaryKey(),
            'nama_warga' => $this->string(255)->defaultValue(null),
            'kelurahan' => $this->string(11)->defaultValue(null),
            'alamat' => $this->string(500)->defaultValue(null),
            'no_telepon_pelapor' => $this->string(255)->defaultValue(null),
            'no_telepon_terlapor' => $this->string(255)->defaultValue(null),
            'jenis_laporan' => $this->integer(11)->defaultValue(null),
            'kota_asal' => $this->string(255)->defaultValue(null),
            'kelurahan_datang' => $this->string(255)->defaultValue(null),
            'status' => $this->integer(11)->defaultValue(null),
            'keterangan' => $this->text(),
            'id_pelapor' => $this->integer(11)->defaultValue(null),
            'id_posko' => $this->integer(11)->defaultValue(null),
            'luar_negeri' => $this->string(11)->defaultValue(null),
            'id_negara' => $this->string(11)->defaultValue(null),
            'data_posko_id' => $this->integer(11)->defaultValue(null),
            'created_at' => $this->datetime()->defaultValue(null),
            'created_by' => $this->integer(11)->defaultValue(null),
            'updated_at' => $this->datetime()->defaultValue(null),
            'updated_by' => $this->integer(11)->defaultValue(null)
        ]);

        $this->addforeignKey('laporan_jenis_fk', 'laporan', 'jenis_laporan', 'jenis_laporan', 'id');
        $this->addForeignKey('laporan_pelapor_fk', 'laporan', 'id_pelapor', 'users', 'id');
        $this->addForeignKey('laporan_posko_fk', 'laporan', 'id_posko', 'posko', 'id');
        $this->addForeignKey('laporan_data_posko_fk', 'laporan', 'data_posko_id', 'data_posko', 'id');
        $this->addForeignKey('laporan_created_fk', 'laporan', 'created_by', 'users', 'id');
        $this->addForeignKey('laporan_updated_fk', 'laporan', 'updated_by', 'users', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('laporan');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_073857_membuat_tabel_laporan cannot be reverted.\n";

        return false;
    }
    */
}
