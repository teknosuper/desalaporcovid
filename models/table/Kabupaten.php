<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property string $id_kab
 * @property string $id_prov
 * @property string $nama
 *
 * @property Provinsi $prov
 * @property Kecamatan[] $kecamatans
 */
class Kabupaten extends \yii\db\ActiveRecord
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
            [['id_kab', 'id_prov', 'nama'], 'required'],
            [['id_kab'], 'string', 'max' => 4],
            [['id_prov'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 255],
            [['id_kab'], 'unique'],
            [['id_prov'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_prov' => 'id_prov']],
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
        ];
    }

    /**
     * Gets query for [[Prov]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProv()
    {
        return $this->hasOne(Provinsi::className(), ['id_prov' => 'id_prov']);
    }

    /**
     * Gets query for [[Kecamatans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['id_kab' => 'id_kab']);
    }
}
