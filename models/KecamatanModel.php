<?php

namespace app\models;

use Yii;
use app\models\table\Kecamatan;

class KecamatanModel extends Kecamatan
{
	public function getKecamatanBelongsToKabupatenModel()
	{
		return $this->hasOne(KabupatenModel::className(),['id_kab'=>'id_kab']);
	}

}