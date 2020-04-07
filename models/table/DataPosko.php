<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "data_posko".
 *
 * @property int $id
 * @property string|null $nik
 * @property string|null $nama_warga
 * @property string|null $kelurahan
 * @property string|null $alamat
 * @property string|null $no_telepon
 * @property int|null $jenis_laporan
 * @property string|null $kota_asal
 * @property string|null $kelurahan_datang
 * @property int|null $status
 * @property string|null $keterangan
 * @property int|null $id_posko
 * @property int|null $luar_negeri
 * @property string|null $id_negara
 * @property string|null $waktu_datang
 * @property int|null $usia
 * @property string|null $gender
 * @property string|null $tanggal_lahir
 * @property string|null $tempat_lahir
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Users $createdBy
 * @property Posko $posko
 * @property Users $updatedBy
 * @property DataPoskoHistory[] $dataPoskoHistories
 * @property Laporan[] $laporans
 */
class DataPosko extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_posko';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_laporan', 'status', 'id_posko', 'luar_negeri', 'usia', 'created_by', 'updated_by'], 'integer'],
            [['keterangan'], 'string'],
            [['waktu_datang', 'tanggal_lahir', 'created_at', 'updated_at'], 'safe'],
            [['nik', 'nama_warga', 'no_telepon', 'kota_asal', 'kelurahan_datang', 'tempat_lahir'], 'string', 'max' => 255],
            [['kelurahan', 'id_negara'], 'string', 'max' => 11],
            [['alamat'], 'string', 'max' => 500],
            [['gender'], 'string', 'max' => 2],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'nik' => Yii::t('app', 'Nik'),
            'nama_warga' => Yii::t('app', 'Nama Warga'),
            'kelurahan' => Yii::t('app', 'Kelurahan'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_telepon' => Yii::t('app', 'No Telepon'),
            'jenis_laporan' => Yii::t('app', 'Jenis Laporan'),
            'kota_asal' => Yii::t('app', 'Kota Asal'),
            'kelurahan_datang' => Yii::t('app', 'Kelurahan Datang'),
            'status' => Yii::t('app', 'Status'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'id_posko' => Yii::t('app', 'Id Posko'),
            'luar_negeri' => Yii::t('app', 'Luar Negeri'),
            'id_negara' => Yii::t('app', 'Id Negara'),
            'waktu_datang' => Yii::t('app', 'Waktu Datang'),
            'usia' => Yii::t('app', 'Usia'),
            'gender' => Yii::t('app', 'Gender'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
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

    /**
     * Gets query for [[DataPoskoHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPoskoHistories()
    {
        return $this->hasMany(DataPoskoHistory::className(), ['data_posko_id' => 'id']);
    }

    /**
     * Gets query for [[Laporans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans()
    {
        return $this->hasMany(Laporan::className(), ['data_posko_id' => 'id']);
    }
}
