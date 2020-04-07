<?php

namespace app\models;

use Yii;
use app\models\table\Kabupaten;

class KabupatenModel extends Kabupaten
{

	public static function getTextKabById($id_kab)
	{
		$model = self::find()->where(['id_kab'=>$id_kab])->one();
		if($model)
		{
            $nama = $model->nama;
			return implode(' - ', [$nama]);
		}
		else
		{
			return $id_kab;
		}
	}

}