<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "kelurahan".
 *
 * @property string $id_kel
 * @property string|null $id_kec
 * @property string|null $nama
 * @property int $id_jenis
 */
class KelurahanTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelurahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kel', 'id_jenis'], 'required'],
            [['nama'], 'string'],
            [['id_jenis'], 'integer'],
            [['id_kel'], 'string', 'max' => 10],
            [['id_kec'], 'string', 'max' => 6],
            [['id_kel'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kel' => Yii::t('app', 'Id Kel'),
            'id_kec' => Yii::t('app', 'Id Kec'),
            'nama' => Yii::t('app', 'Nama'),
            'id_jenis' => Yii::t('app', 'Id Jenis'),
        ];
    }
}
