<?php

namespace app\models;

use Yii;
use app\models\table\JenisLaporanTable;
use yii\helpers\ArrayHelper;

class JenisLaporanModel extends JenisLaporanTable
{

    public static function getJenisLaporanList()
    {
        $model = self::find()->all();
        if ($model)
        {
            return ArrayHelper::map ($model, 'id', 'nama_laporan');
        }
    }

}