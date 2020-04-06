<?php

use yii\db\Migration;

/**
 * Class m200406_043022_membuat_tabel_kecamatan
 */
class m200406_043022_membuat_tabel_kecamatan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('kecamatan', [
            'id_kec' => $this->char(6)->notNull(),
            'id_kab' => $this->char(4)->notNull(),
            'nama' => $this->string()->notNull()
        ]);

        $this->addPrimaryKey('kec_pk', 'kecamatan', 'id_kec');
        $this->addForeignKey('kec_kab_fk', 'kecamatan', 'id_kab', 'kabupaten', 'id_kab');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('kecamatan');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_043022_membuat_tabel_kecamatan cannot be reverted.\n";

        return false;
    }
    */
}
