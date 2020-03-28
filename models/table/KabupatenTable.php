<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property string $id_kab
 * @property string $id_prov
 * @property string $nama
 * @property int $id_jenis
 */
class KabupatenTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kab', 'id_prov', 'nama', 'id_jenis'], 'required'],
            [['nama'], 'string'],
            [['id_jenis'], 'integer'],
            [['id_kab'], 'string', 'max' => 4],
            [['id_prov'], 'string', 'max' => 2],
            [['id_kab'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kab' => Yii::t('app', 'Id Kab'),
            'id_prov' => Yii::t('app', 'Id Prov'),
            'nama' => Yii::t('app', 'Nama'),
            'id_jenis' => Yii::t('app', 'Id Jenis'),
        ];
    }
}
