<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Laporan Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-model-view box box-primary">
    <div class="box-header">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nama_warga',
                'kelurahan',
                'alamat',
                'no_telepon_pelapor',
                'no_telepon_terlapor',
                'jenis_laporan',
                'kota_asal',
                'kelurahan_datang',
                'status',
                'keterangan:ntext',
                'id_pelapor',
                'id_posko',
            ],
        ]) ?>
    </div>
</div>
