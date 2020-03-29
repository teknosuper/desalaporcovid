<?php

namespace app\models;

use Yii;
use app\models\table\LaporanTable;

class LaporanModel extends LaporanTable
{

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama_warga' => Yii::t('app', 'Nama Warga'),
            'kelurahan' => Yii::t('app', 'Kelurahan / Desa'),
            'alamat' => Yii::t('app', 'Alamat Lengkap'),
            'no_telepon_pelapor' => Yii::t('app', 'No Telepon Pelapor'),
            'no_telepon_terlapor' => Yii::t('app', 'No Telepon Terlapor'),
            'jenis_laporan' => Yii::t('app', 'Jenis Laporan'),
            'kota_asal' => Yii::t('app', 'Kota Asal'),
            'kelurahan_datang' => Yii::t('app', 'Kelurahan Datang'),
            'status' => Yii::t('app', 'Status'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'id_pelapor' => Yii::t('app', 'Pelapor'),
            'id_posko' => Yii::t('app', 'Posko'),
            'luar_negeri' => Yii::t('app', 'Apakah Dari Luar Negeri ? '),
            'id_negara' => Yii::t('app', 'Negara'),
        ];
    }

}