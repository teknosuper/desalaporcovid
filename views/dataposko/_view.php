<?php 
use yii\widgets\DetailView;
?>

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
                [
                    'attribute' => 'gender',
                    'format'=>'html',
                    'value' => function ($model) {
                        return ($model->genderDetail) ? $model->genderDetail : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'usia',
                'no_telepon',
                [
                    'attribute' => 'luar_negeri',
                    'value' => function ($model) {
                        return $model->luarNegeriText;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                [
                    'attribute' => 'id_negara',
                    'value' => function ($model) {
                        return ($model->negaraBelongsToNegaraModel) ? $model->negaraBelongsToNegaraModel->nama : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
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
                    'format'=>'html',
                    'value' => function ($model) {
                        return ($model->statusDetail) ? $model->statusDetail : null;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                [
                    'attribute' => 'waktu_datang',
                    'format'=>'raw',
                    'value' => function ($model) {
                    	$waktu_datang = date('d F Y H:i:s',strtotime($model->waktu_datang));
                        return "<span class='badge'>{$waktu_datang}</span>";
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                [
                    'attribute' => 'created_by',
                    'value' => function ($model) {
                        return $model->createdByText;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'created_at',
                [
                    'attribute' => 'updated_by',
                    'value' => function ($model) {
                        return $model->updatedByText;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'updated_at',              
            ],
        ]) ?>