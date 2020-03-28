<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\form\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Laporan Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-model-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a(Yii::t('app', 'Create Laporan Model'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nama_warga',
                'kelurahan',
                'alamat',
                'no_telepon_pelapor',
                // 'no_telepon_terlapor',
                // 'jenis_laporan',
                // 'kota_asal',
                // 'kelurahan_datang',
                // 'status',
                // 'keterangan:ntext',
                // 'id_pelapor',
                // 'id_posko',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
