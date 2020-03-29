<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanModel */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Laporan Warga',
]) . $model->nama_warga;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Laporan Saya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_warga, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="laporan-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
