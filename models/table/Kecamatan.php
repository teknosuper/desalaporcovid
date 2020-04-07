<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $id_kec
 * @property string $id_kab
 * @property string $nama
 *
 * @property Kabupaten $kab
 * @property Kelurahan[] $kelurahans
 */
class Kecamatan extends \yii\db\ActiveRecord
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
            [['id_kec'], 'string', 'max' => 6],
            [['id_kab'], 'string', 'max' => 4],
            [['nama'], 'string', 'max' => 255],
            [['id_kec'], 'unique'],
            [['id_kab'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_kab' => 'id_kab']],
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

    /**
     * Gets query for [[Kab]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKab()
    {
        return $this->hasOne(Kabupaten::className(), ['id_kab' => 'id_kab']);
    }

    /**
     * Gets query for [[Kelurahans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahans()
    {
        return $this->hasMany(Kelurahan::className(), ['id_kec' => 'id_kec']);
    }
}
