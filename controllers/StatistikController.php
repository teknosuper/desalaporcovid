<?php

namespace app\controllers;
use app\models\LaporanModel;
use app\models\PoskoModel;

class StatistikController extends \yii\web\Controller
{
    public function actionOverall()
    {

    	$jumlahLaporan = LaporanModel::getLaporanCount();
    	$jumlahPosko = PoskoModel::getPoskoCount();
    	$jumlahDesa = PoskoModel::getDesaAktifCount();
    	$jumlahKabKota = PoskoModel::getTotalKabKota();

        return $this->render('overall', [
        	'jumlahLaporan' => $jumlahLaporan,
        	'jumlahPosko' => $jumlahPosko,
        	'jumlahDesa' => $jumlahDesa,
        	'jumlahKabKota' => $jumlahKabKota,
        ]);
    }

}
