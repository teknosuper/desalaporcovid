<?php

namespace app\models;

use Yii;
use app\models\table\PoskoTable;
use yii\helpers\ArrayHelper;

class PoskoModel extends PoskoTable
{

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_kelurahan' => Yii::t('app', 'Kelurahan / Desa'),
            'nama_posko' => Yii::t('app', 'Nama Posko'),
            'alamat_posko' => Yii::t('app', 'Alamat Posko'),
            'email_posko' => Yii::t('app', 'Email Posko'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

	public function getPoskoBelongsToKelurahanModel()
	{
		return $this->hasOne(KelurahanModel::className(),['id_kel'=>'id_kelurahan']);
	}

    public static function getPoskoList()
    {
        $model = self::find()->all();
        if ($model)
        {
            return ArrayHelper::map ($model, 'id', 'nama_posko');
        }
    }

}