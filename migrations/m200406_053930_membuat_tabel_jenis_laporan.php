<?php

use yii\db\Migration;

/**
 * Class m200406_053930_membuat_tabel_jenis_laporan
 */
class m200406_053930_membuat_tabel_jenis_laporan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('jenis_laporan', [
            'id' => $this->primaryKey(),
            'nama_laporan' => $this->string(255),
            'keterangan' => $this->string(255),
            'status' => $this->integer(11),
            'kode' => $this->string(255)->unique()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('jenis_laporan');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_053930_membuat_tabel_jenis_laporan cannot be reverted.\n";

        return false;
    }
    */
}
