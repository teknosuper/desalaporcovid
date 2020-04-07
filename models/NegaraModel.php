<?php

namespace app\models;

use Yii;
use app\models\table\Negara;

class NegaraModel extends Negara
{

	public static function getTextNegaraById($id)
	{
		$model = self::find()->where(['id'=>$id])->one();
		if($model)
		{
            $nama = $model->nama;
            $kode_negara = $model->kode_negara;
			return implode(' - ', [$nama,$kode_negara]);
		}
		else
		{
			return $id;
		}
	}

}