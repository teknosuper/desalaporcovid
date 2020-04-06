<?php

use yii\db\Migration;

/**
 * Class m200406_042606_membuat_tabel_kabupaten
 */
class m200406_042606_membuat_tabel_kabupaten extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('kabupaten', [
            'id_kab' => $this->char(4)->notNull(),
            'id_prov' => $this->char(2)->notNull(),
            'nama' => $this->string()->notNull()
        ]);
        $this->addPrimaryKey('kabupaten_pk', 'kabupaten', 'id_kab');
        $this->addForeignKey('kab_prov_fk', 'kabupaten', 'id_prov', 'provinsi', 'id_prov');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('kabupaten');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        

    }

    public function down()
    {
        echo "m200406_042606_membuat_tabel_kabupaten cannot be reverted.\n";

        return false;
    }
    */
    
}
