<?php

namespace app\models;

use Yii;
use app\models\table\KecamatanTable;

class KecamatanModel extends KecamatanTable
{
	public function getKecamatanBelongsToKabupatenModel()
	{
		return $this->hasOne(KabupatenModel::className(),['id_kab'=>'id_kab']);
	}

}