<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property int $id
 * @property string|null $nama_warga
 * @property int|null $kelurahan
 * @property string|null $alamat
 * @property string|null $no_telepon_pelapor
 * @property string|null $no_telepon_terlapor
 * @property int|null $jenis_laporan
 * @property int|null $kota_asal
 * @property int|null $kelurahan_datang
 * @property int|null $status
 * @property string|null $keterangan
 * @property int|null $id_pelapor
 * @property int|null $id_posko
 * @property int|null $luar_negeri
 * @property int|null $id_negara
 */
class LaporanTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelurahan', 'jenis_laporan', 'kota_asal', 'kelurahan_datang', 'status', 'id_pelapor', 'id_posko', 'luar_negeri', 'id_negara'], 'integer'],
            [['keterangan'], 'string'],
            [['nama_warga', 'no_telepon_pelapor', 'no_telepon_terlapor'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama_warga' => Yii::t('app', 'Nama Warga'),
            'kelurahan' => Yii::t('app', 'Kelurahan'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_telepon_pelapor' => Yii::t('app', 'No Telepon Pelapor'),
            'no_telepon_terlapor' => Yii::t('app', 'No Telepon Terlapor'),
            'jenis_laporan' => Yii::t('app', 'Jenis Laporan'),
            'kota_asal' => Yii::t('app', 'Kota Asal'),
            'kelurahan_datang' => Yii::t('app', 'Kelurahan Datang'),
            'status' => Yii::t('app', 'Status'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'id_pelapor' => Yii::t('app', 'Id Pelapor'),
            'id_posko' => Yii::t('app', 'Id Posko'),
            'luar_negeri' => Yii::t('app', 'Luar Negeri'),
            'id_negara' => Yii::t('app', 'Id Negara'),
        ];
    }
}
