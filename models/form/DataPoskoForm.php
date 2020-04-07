<?php

namespace app\models\form;

use Yii;

class DataPoskoForm extends \app\models\DataPoskoModel
{

    public function rules()
    {
        return [
            [['jenis_laporan', 'status', 'id_posko', 'luar_negeri'], 'integer'],
            [['keterangan'], 'string'],
            [['nik', 'nama_warga', 'no_telepon'], 'string', 'max' => 255],
            [['kelurahan', 'kota_asal', 'kelurahan_datang', 'id_negara'], 'string', 'max' => 11],
            [['alamat'], 'string', 'max' => 500],
            [['nik','nama_warga','kelurahan','alamat','no_telepon','jenis_laporan','kota_asal','kelurahan_datang','status','keterangan','id_posko','luar_negeri','id_negara','waktu_datang','created_at','created_by','updated_at','updated_by','gender','tanggal_lahir','tempat_lahir','usia'],'safe'],
            [['nama_warga','kelurahan','alamat','jenis_laporan','kota_asal','kelurahan_datang','status','keterangan','luar_negeri','waktu_datang','id_posko','gender','usia'],'required'],
        ];
    }

}