<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "posko".
 *
 * @property int $id
 * @property int|null $id_kelurahan
 * @property string|null $nama_posko
 * @property string|null $alamat_posko
 * @property string|null $email_posko
 * @property string|null $keterangan
 * @property int|null $status
 */
class PoskoTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posko';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kelurahan', 'status'], 'integer'],
            [['keterangan'], 'string'],
            [['nama_posko', 'alamat_posko', 'email_posko'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_kelurahan' => Yii::t('app', 'Id Kelurahan'),
            'nama_posko' => Yii::t('app', 'Nama Posko'),
            'alamat_posko' => Yii::t('app', 'Alamat Posko'),
            'email_posko' => Yii::t('app', 'Email Posko'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
