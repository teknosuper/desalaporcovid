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
 * @property string|null $luar_negeri
 * @property string|null $id_negara
 * @property int|null $data_posko_id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Users $createdBy
 * @property DataPosko $dataPosko
 * @property JenisLaporan $jenisLaporan
 * @property Users $pelapor
 * @property Posko $posko
 * @property Users $updatedBy
 */
class Laporan extends \yii\db\ActiveRecord
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
            [['jenis_laporan', 'status', 'id_pelapor', 'id_posko', 'data_posko_id', 'created_by', 'updated_by'], 'integer'],
            [['keterangan'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_warga', 'no_telepon_pelapor', 'no_telepon_terlapor', 'kota_asal', 'kelurahan_datang'], 'string', 'max' => 255],
            [['kelurahan', 'luar_negeri', 'id_negara'], 'string', 'max' => 11],
            [['alamat'], 'string', 'max' => 500],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['data_posko_id'], 'exist', 'skipOnError' => true, 'targetClass' => DataPosko::className(), 'targetAttribute' => ['data_posko_id' => 'id']],
            [['jenis_laporan'], 'exist', 'skipOnError' => true, 'targetClass' => JenisLaporan::className(), 'targetAttribute' => ['jenis_laporan' => 'id']],
            [['id_pelapor'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_pelapor' => 'id']],
            [['id_posko'], 'exist', 'skipOnError' => true, 'targetClass' => Posko::className(), 'targetAttribute' => ['id_posko' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'data_posko_id' => Yii::t('app', 'Data Posko ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[DataPosko]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPosko()
    {
        return $this->hasOne(DataPosko::className(), ['id' => 'data_posko_id']);
    }

    /**
     * Gets query for [[JenisLaporan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisLaporan()
    {
        return $this->hasOne(JenisLaporan::className(), ['id' => 'jenis_laporan']);
    }

    /**
     * Gets query for [[Pelapor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelapor()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_pelapor']);
    }

    /**
     * Gets query for [[Posko]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosko()
    {
        return $this->hasOne(Posko::className(), ['id' => 'id_posko']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'updated_by']);
    }
}
