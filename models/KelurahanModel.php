<?php

namespace app\models;

use Yii;
use app\models\table\KelurahanTable;

class KelurahanModel extends KelurahanTable
{

	public function getKelurahanBelongsToKecamatanModel()
	{
		return $this->hasOne(KecamatanModel::className(),['id_kec'=>'id_kec']);
	}

}