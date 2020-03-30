<?php

namespace app\models\form;

use Yii;

class LaporanForm extends \app\models\LaporanModel
{

    public function rules()
    {
        return [
            [['kelurahan', 'jenis_laporan', 'kota_asal', 'kelurahan_datang', 'status', 'id_pelapor', 'id_posko', 'luar_negeri', 'id_negara'], 'integer'],
            [['keterangan'], 'string'],
            [['nama_warga', 'no_telepon_pelapor', 'no_telepon_terlapor'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 500],
            [['kelurahan', 'jenis_laporan', 'kota_asal', 'kelurahan_datang', 'status', 'id_posko', 'luar_negeri','no_telepon_pelapor','nama_warga','no_telepon_terlapor','alamat','keterangan'], 'required'],
        ];
    }

}