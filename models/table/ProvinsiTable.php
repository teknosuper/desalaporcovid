<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $id_prov
 * @property string $nama
 */
class ProvinsiTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prov', 'nama'], 'required'],
            [['nama'], 'string'],
            [['id_prov'], 'string', 'max' => 2],
            [['id_prov'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prov' => Yii::t('app', 'Id Prov'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }
}
