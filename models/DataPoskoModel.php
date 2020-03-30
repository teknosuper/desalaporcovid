<?php

namespace app\models;

use Yii;
use app\models\table\DataPoskoTable;

class DataPoskoModel extends DataPoskoTable
{


    // const STATUS_DELETED = 20;
    const STATUS_DALAM_PEMANTAUAN = 10;
    const STATUS_GEJALA = 20;
    const STATUS_POSITIF = 30;
    const STATUS_SEMBUH = 40;
    const STATUS_PERGI = 50;
    const STATUS_NEGATIF = 60;

	public function getKelurahanBelongsToKelurahanModel()
	{
		return $this->hasOne(KelurahanModel::className(),['id_kel'=>'kelurahan']);
	}

	public function getKelurahanDatangBelongsToKelurahanModel()
	{
		return $this->hasOne(KelurahanModel::className(),['id_kel'=>'kelurahan_datang']);
	}

	public function getKotaAsalBelongsToKabupatenModel()
	{
		return $this->hasOne(KabupatenModel::className(),['id_kab'=>'kota_asal']);
	}

	public function getJenisLaporanBelongsToJenisLaporanModel()
	{
		return $this->hasOne(JenisLaporanModel::className(),['id'=>'jenis_laporan']);
	}

	public function getPoskoBelongsToPoskoModel()
	{
		return $this->hasOne(PoskoModel::className(),['id'=>'id_posko']);
	}

    public function getStatusDetail()
    {
        $status = $this->status;
        $array = self::getStatusList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

    public static function getStatusList()
    {
        return [
            // self::STATUS_DELETED=>"DI HAPUS",
            self::STATUS_DALAM_PEMANTAUAN=>"STATUS DALAM PEMANTAUAN",
            self::STATUS_GEJALA=>"STATUS GEJALA",
            self::STATUS_POSITIF=>"STATUS POSITIF",
            self::STATUS_SEMBUH=>"STATUS SEMBUH",
            self::STATUS_PERGI=>"STATUS PERGI",
            self::STATUS_NEGATIF=>"STATUS NEGATIF",
        ];
    }

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
            'id_posko' => Yii::t('app', 'Posko'),
            'luar_negeri' => Yii::t('app', 'Apakah Dari Luar Negeri ? '),
            'id_negara' => Yii::t('app', 'Negara'),
        ];
    }

}