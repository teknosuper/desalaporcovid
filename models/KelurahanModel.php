<?php

namespace app\models;

use Yii;
use app\models\table\Kelurahan;

class KelurahanModel extends Kelurahan
{

	public function getKelurahanBelongsToKecamatanModel()
	{
		return $this->hasOne(KecamatanModel::className(),['id_kec'=>'id_kec']);
	}

    public static function getKelurahanListByIdKel($id_kel)
    {
        $model = self::find()->where(['id_kel'=>$id_kel])->all();
		$lists = [];
        if ($model)
        {
        	foreach($model as $data)
        	{
				$lists[$data->id_kel] = $data->textKelurahan;
        	}
        }
        return $lists;
    }

    public function getTextKelurahan()
    {
    	$model = $this;
        $kelurahan = $model->nama;
        $kecamatan = $model->kelurahanBelongsToKecamatanModel->nama;
        $kabupaten = $model->kelurahanBelongsToKecamatanModel->kecamatanBelongsToKabupatenModel->nama;
		return implode(' - ', [$kelurahan,$kecamatan,$kabupaten]);
    }

	public static function getTextKelurahanById($id_kel)
	{
		$model = self::find()->where(['id_kel'=>$id_kel])->one();
		if($model)
		{
            $kelurahan = $model->nama;
            $kecamatan = $model->kelurahanBelongsToKecamatanModel->nama;
            $kabupaten = $model->kelurahanBelongsToKecamatanModel->kecamatanBelongsToKabupatenModel->nama;
			return implode(' - ', [$kelurahan,$kecamatan,$kabupaten]);
		}
		else
		{
			return $id_kel;
		}
	}

}