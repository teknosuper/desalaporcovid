<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "kelurahan".
 *
 * @property string $id_kel
 * @property string $id_kec
 * @property string $nama
 *
 * @property Kecamatan $kec
 * @property Posko[] $poskos
 */
class Kelurahan extends \yii\db\ActiveRecord
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
            [['id_kel', 'id_kec', 'nama'], 'required'],
            [['id_kel'], 'string', 'max' => 10],
            [['id_kec'], 'string', 'max' => 6],
            [['nama'], 'string', 'max' => 255],
            [['id_kel'], 'unique'],
            [['id_kec'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kec' => 'id_kec']],
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
        ];
    }

    /**
     * Gets query for [[Kec]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKec()
    {
        return $this->hasOne(Kecamatan::className(), ['id_kec' => 'id_kec']);
    }

    /**
     * Gets query for [[Poskos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoskos()
    {
        return $this->hasMany(Posko::className(), ['id_kelurahan' => 'id_kel']);
    }
}
