<?php

use yii\db\Migration;

/**
 * Class m200406_043433_membuat_tabel_negara
 */
class m200406_043433_membuat_tabel_negara extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('negara', [
            'id' => $this->primaryKey(),
            'kode_negara' => $this->string(2)->notNull()->defaultValue(''),
            'nama' => $this->string(100)->notNull()->defaultValue('')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('negara');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_043433_membuat_tabel_negara cannot be reverted.\n";

        return false;
    }
    */
}
