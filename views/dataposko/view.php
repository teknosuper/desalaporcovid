<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataPoskoModel */

$this->title = implode(' - ', [$model->nama_warga,$model->nik]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Pantauan Posko'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-posko-model-view box box-primary">
    <div class="box-header">
        <?php if(\yii::$app->user->identity->userType==\app\models\User::LEVEL_POSKO):?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif;?>

        <?php if(\yii::$app->user->identity->userType==\app\models\User::LEVEL_ADMIN):?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-flat',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif;?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                [
                    'attribute' => 'jenis_laporan',
                    'value' => function ($model) {
                        return ($model->jenisLaporanBelongsToJenisLaporanModel) ? $model->jenisLaporanBelongsToJenisLaporanModel->nama_laporan : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'nama_warga',
                [
                    'attribute' => 'kelurahan',
                    'value' => function ($model) {
                        return ($model->kelurahanBelongsToKelurahanModel) ? implode(' - ', [$model->kelurahanBelongsToKelurahanModel->nama,$model->kelurahanBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama,$model->kelurahanBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->kecamatanBelongsToKabupatenModel->nama]) : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'alamat',
                'no_telepon',
                [
                    'attribute' => 'kota_asal',
                    'value' => function ($model) {
                        return ($model->kotaAsalBelongsToKabupatenModel) ? implode(' - ', [$model->kotaAsalBelongsToKabupatenModel->nama]) : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                [
                    'attribute' => 'kelurahan_datang',
                    'value' => function ($model) {
                        return ($model->kelurahanDatangBelongsToKelurahanModel) ? implode(' - ', [$model->kelurahanDatangBelongsToKelurahanModel->nama,$model->kelurahanDatangBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama,$model->kelurahanDatangBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->kecamatanBelongsToKabupatenModel->nama]) : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'keterangan:ntext',
                // 'id_pelapor',
                [
                    'attribute' => 'id_posko',
                    'value' => function ($model) {
                        return ($model->poskoBelongsToPoskoModel) ? implode(' - ', [$model->poskoBelongsToPoskoModel->nama_posko,$model->poskoBelongsToPoskoModel->poskoBelongsToKelurahanModel->nama,$model->poskoBelongsToPoskoModel->poskoBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama]) : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                [
                    'attribute' => 'status',
                    'value' => function ($model) {
                        return ($model->statusDetail) ? $model->statusDetail : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'waktu_datang',
                'created_at',
                [
                    'attribute' => 'created_by',
                    'value' => function ($model) {
                        return ($model->created_by) ? $model->created_by : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],                
                'updated_at',
                [
                    'attribute' => 'updated_by',
                    'value' => function ($model) {
                        return ($model->updated_by) ? $model->updated_by : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],                
            ],
        ]) ?>
    </div>
</div>
