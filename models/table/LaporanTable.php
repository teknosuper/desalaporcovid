<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property int $id
 * @property string|null $nama_warga
 * @property string|null $kelurahan
 * @property string|null $alamat
 * @property string|null $no_telepon_pelapor
 * @property string|null $no_telepon_terlapor
 * @property int|null $jenis_laporan
 * @property string|null $kota_asal
 * @property string|null $kelurahan_datang
 * @property int|null $status
 * @property string|null $keterangan
 * @property int|null $id_pelapor
 * @property int|null $id_posko
 * @property int|null $luar_negeri
 * @property string|null $id_negara
 * @property string|null $created_time
 * @property string|null $updated_time
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $data_posko_id
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
            [['jenis_laporan', 'status', 'id_pelapor', 'id_posko', 'luar_negeri', 'created_by', 'updated_by', 'data_posko_id'], 'integer'],
            [['keterangan'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['nama_warga', 'no_telepon_pelapor', 'no_telepon_terlapor'], 'string', 'max' => 255],
            [['kelurahan', 'kota_asal', 'kelurahan_datang', 'id_negara'], 'string', 'max' => 11],
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
            'created_time' => Yii::t('app', 'Created Time'),
            'updated_time' => Yii::t('app', 'Updated Time'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'data_posko_id' => Yii::t('app', 'Data Posko ID'),
        ];
    }
}
