<?php

use yii\db\Migration;

/**
 * Class m200406_071927_membuat_tabel_data_posko_history
 */
class m200406_071927_membuat_tabel_data_posko_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('data_posko_history', [
            'id' => $this->primaryKey(),
            'data_posko_id' => $this->integer(11)->defaultValue(null),
            'tanggal' => $this->datetime()->defaultValue(null),
            'keterangan' => $this->text(),
            'created_by' => $this->integer(11)->defaultValue(null),
            'created_at' => $this->datetime()->defaultValue(null),
            'updated_by' => $this->integer(11)->defaultValue(null),
            'updated_at' => $this->datetime()->defaultValue(null)
        ]);

        $this->addForeignKey('data_posko_history_fk', 'data_posko_history', 'data_posko_id', 'data_posko', 'id');
        $this->addForeignKey('data_posko_history_created_fk', 'data_posko_history', 'created_by', 'users', 'id');
        $this->addForeignKey('data_posko_history_updated_fk', 'data_posko_history', 'updated_by', 'users', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('data_posko_history');
        return true; 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200406_071927_membuat_tabel_data_posko_history cannot be reverted.\n";

        return false;
    }
    */
}
