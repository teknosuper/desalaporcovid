<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $id_kec
 * @property string $id_kab
 * @property string $nama
 */
class KecamatanTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kec', 'id_kab', 'nama'], 'required'],
            [['nama'], 'string'],
            [['id_kec'], 'string', 'max' => 6],
            [['id_kab'], 'string', 'max' => 4],
            [['id_kec'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kec' => Yii::t('app', 'Id Kec'),
            'id_kab' => Yii::t('app', 'Id Kab'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }
}
