<?php

use yii\db\Migration;

/**
 * Class m200406_043225_membuat_tabel_kelurahan
 */
class m200406_043225_membuat_tabel_kelurahan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('kelurahan', [
            'id_kel' => $this->char(10)->notNull(),
            'id_kec' => $this->char(6)->notNull(),
            'nama' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('kel_pk', 'kelurahan', 'id_kel');
        $this->addForeignKey('kel_kec_fk', 'kelurahan', 'id_kec', 'kecamatan', 'id_kec');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('kelurahan');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_043225_membuat_tabel_kelurahan cannot be reverted.\n";

        return false;
    }
    */
}
