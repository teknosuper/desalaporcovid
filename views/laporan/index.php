<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\JsExpression;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\form\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Laporan Saya');
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php /*
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Statistik Laporan Warga <?= \yii::$app->user->identity->namaKelurahan;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">

              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="#">Total Laporan Warga<span class="pull-right text-red"> </span></a>
                    <a href="#">Total Laporan <b>MENUNGGU DIPROSES</b><span class="pull-right text-red"> </span></a>
                    <a href="#">Total <b>SEDANG DIPROSES</b><span class="pull-right text-red"> </span></a>
                    <a href="#">Total <b>SUDAH DIPROSES</b><span class="pull-right text-red"> </span></a>
                    <a href="#">Total <b>TIDAK VALID</b><span class="pull-right text-red"> </span></a>
                </li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
    */ ?>

<div class="laporan-model-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a(Yii::t('app', 'Buat Laporan Baru'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                [
                    'attribute' => 'jenis_laporan',
                    'value' => function ($model) {
                        return $model->jenisLaporanText;
                    },
                    'filter' => \app\models\JenisLaporanModel::getJenisLaporanList(),
                    'filterInputOptions' => ['prompt' => 'Semua Jenis Laporan', 'class' => 'form-control', 'id' => null]
                ],
                // 'jenis_laporan',
                'nama_warga',
                [
                    'attribute' => 'kelurahan',
                    'value' => function ($model) {
                        return $model->kelurahanText;
                    },
                    'filter' => Select2::widget([

                        'model' => $searchModel,

                        'attribute' => 'kelurahan',

                        // 'data' => Object::typeNames(),

                        'theme' => Select2::THEME_BOOTSTRAP,

                        'hideSearch' => true,
                        'initValueText' => \app\models\KelurahanModel::getTextKelurahanById($searchModel->kelurahan),                        
                        'options' => [

                            'placeholder' => 'Pilih Kelurahan/Desa ...',

                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'minimumInputLength' => 4,
                            'language' => [
                                'errorLoading' => new JsExpression("function () { return 'Sedang mencari data...'; }"),
                            ],
                            'ajax' => [
                                'url' => \yii\helpers\Url::to(['/site/getdatakelurahan']),
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {q:params.term}; }')
                            ],
                        ],

                    ]),
                    // 'filterInputOptions' => ['prompt' => 'All Categories', 'class' => 'form-control', 'id' => null]
                ],
                // 'alamat',
                // 'no_telepon_pelapor',
                // 'no_telepon_terlapor',
                [
                    'attribute' => 'kota_asal',
                    'value' => function ($model) {
                        return $model->kotaAsalText;
                    },
                    'filter' => Select2::widget([

                        'model' => $searchModel,

                        'attribute' => 'kota_asal',

                        // 'data' => Object::typeNames(),

                        'theme' => Select2::THEME_BOOTSTRAP,

                        'hideSearch' => true,
                        'initValueText' => \app\models\KabupatenModel::getTextKabById($searchModel->kota_asal),                        
                        'options' => [

                            'placeholder' => 'Pilih Kota/Kab ...',

                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'minimumInputLength' => 4,
                            'language' => [
                                'errorLoading' => new JsExpression("function () { return 'Sedang mencari data...'; }"),
                            ],
                            'ajax' => [
                                'url' => \yii\helpers\Url::to(['/site/getdatakabupaten']),
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {q:params.term}; }')
                            ],
                        ],

                    ]),
                    // 'filterInputOptions' => ['prompt' => 'All Categories', 'class' => 'form-control', 'id' => null]
                ],                
                [
                    'attribute' => 'kelurahan_datang',
                    'value' => function ($model) {
                        return $model->kelurahanDatangText;
                    },
                    'filter' => Select2::widget([

                        'model' => $searchModel,

                        'attribute' => 'kelurahan_datang',

                        // 'data' => Object::typeNames(),

                        'theme' => Select2::THEME_BOOTSTRAP,

                        'hideSearch' => true,
                        'initValueText' => \app\models\KelurahanModel::getTextKelurahanById($searchModel->kelurahan_datang),                        
                        'options' => [

                            'placeholder' => 'Pilih Kelurahan/Desa ...',

                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'minimumInputLength' => 4,
                            'language' => [
                                'errorLoading' => new JsExpression("function () { return 'Sedang mencari data...'; }"),
                            ],
                            'ajax' => [
                                'url' => \yii\helpers\Url::to(['/site/getdatakelurahan']),
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {q:params.term}; }')
                            ],
                        ],

                    ]),
                    // 'filterInputOptions' => ['prompt' => 'All Categories', 'class' => 'form-control', 'id' => null]
                ],
                // 'keterangan:ntext',
                // 'id_pelapor',
                [
                    'attribute' => 'id_posko',
                    'value' => function ($model) {
                        return $model->poskoText;
                    },
                    'filter' => Select2::widget([

                        'model' => $searchModel,

                        'attribute' => 'id_posko',

                        // 'data' => Object::typeNames(),

                        'theme' => Select2::THEME_BOOTSTRAP,

                        'hideSearch' => true,
                        'initValueText' => \app\models\PoskoModel::getTextPoskoById($searchModel->kelurahan),                        
                        'options' => [
                            'placeholder' => 'Pilih Posko ...',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'minimumInputLength' => 4,
                            'language' => [
                                'errorLoading' => new JsExpression("function () { return 'Sedang mencari data...'; }"),
                            ],
                            'ajax' => [
                                'url' => \yii\helpers\Url::to(['/site/getdataposko']),
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {q:params.term}; }')
                            ],
                        ],

                    ]),
                    // 'filterInputOptions' => ['prompt' => 'All Categories', 'class' => 'form-control', 'id' => null]
                ],
                [
                    'attribute' => 'status',
                    'value' => function ($model) {
                        return ($model->statusDetail) ? $model->statusDetail : null;
                    },
                    'filter' => \app\models\LaporanModel::getStatusList(),
                    'filterInputOptions' => ['prompt' => 'Semua Status', 'class' => 'form-control', 'id' => null]
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '#',
                    'headerOptions' => ['style' => 'color:#337ab7;text-align:center;'],
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="fa fa-eye"></span> Detail', $url, [
                                            'title' => Yii::t('app', 'view'),
                                            'class'=>'btn btn-success btn-xs modal-form',
                                            'data-size' => 'modal-lg',
                                ]);
                            },

                            'update' => function ($url, $model) {
                                switch (\yii::$app->user->identity->userType) {
                                    case \app\models\User::LEVEL_POSKO:
                                    case \app\models\User::LEVEL_ADMIN:
                                    case \app\models\User::LEVEL_ADMIN_DESA:
                                        return Html::a('<span class="fa fa-pencil"></span> Ubah', $url, [
                                                    'title' => Yii::t('app', 'update'),
                                                    'class'=>'btn btn-warning btn-xs modal-form',
                                                    'data-size' => 'modal-lg',

                                        ]);
                                        # code...
                                        break;
                                    
                                    default:
                                        if($model->status==\app\models\LaporanModel::STATUS_WAITING)
                                        {
                                            return Html::a('<span class="fa fa-pencil"></span> Ubah', $url, [
                                                        'title' => Yii::t('app', 'update'),
                                                        'class'=>'btn btn-warning btn-xs modal-form',
                                                        'data-size' => 'modal-lg',

                                            ]);                                            
                                        }
                                        # code...
                                        break;
                                }
                            },
                            'delete' => function ($url, $model) {
                                switch (\yii::$app->user->identity->userType) {
                                    case \app\models\User::LEVEL_ADMIN:
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span> Hapus', $url, [
                                                    'title' => Yii::t('app', 'delete'),
                                                    'class'=>'btn btn-danger btn-xs modal-form',
                                                    'data-method'=>'post',
                                                    'data-confirm'=>'Apakah anda yakin akan menghapus data ini ? ',
                                        ]);
                                        # code...
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            }
                    ],
                    // 'urlCreator' => function ($action, $model, $key, $index) {
                    //     if ($action === 'view') {
                    //         $url ='view?id='.$model->id;
                    //         return $url;
                    //     }

                    //     if ($action === 'update') {
                    //         $url ='update?id='.$model->id;
                    //         return $url;
                    //     }
                    // }
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
