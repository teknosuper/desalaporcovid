<?php
use yii\db\Migration;

/**
 * Class m200406_041810_membuat_tabel_provinsi
 */
class m200406_041810_membuat_tabel_provinsi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('provinsi', [
            'id_prov' => $this->char(2)->notNull(),
            'nama' => $this->string()->notNUll()
        ]);

        $this->addPrimaryKey('provinsi_pk', 'provinsi', 'id_prov');
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('provinsi');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        
    }

    public function down()
    {
        
    }
    */
    
}
