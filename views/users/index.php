<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\JsExpression;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\form\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pengguna');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">

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
                'username',
                // 'authKey',
                // 'password',
                'email:email',
                // 'accessToken',
                [
                    'attribute' => 'userType',
                    'value' => function ($model) {
                        return ($model->levelDetail) ? $model->levelDetail : null;
                    },
                    'filter' => \app\models\User::getLevelList(),
                    'filterInputOptions' => ['prompt' => 'Semua Tipe Pengguna', 'class' => 'form-control', 'id' => null]
                ],
                // 'user_id',
                [
                    'attribute' => 'status',
                    'value' => function ($model) {
                        return ($model->statusDetail) ? $model->statusDetail : null;
                    },
                    'filter' => \app\models\User::getStatusList(),
                    'filterInputOptions' => ['prompt' => 'Semua Status', 'class' => 'form-control', 'id' => null]
                ],
                'nama',
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
                // 'kelurahan',
                'alamat',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '#',
                    'headerOptions' => ['style' => 'color:#337ab7;text-align:center;'],
                    'template' => '{view} {update} {delete} {password}',
                    'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="fa fa-eye"></span> Detail', $url, [
                                            'title' => Yii::t('app', 'view'),
                                            'class'=>'btn btn-success btn-xs modal-form',
                                            'data-size' => 'modal-lg',
                                ]);
                            },

                            'update' => function ($url, $model) {
                                return Html::a('<span class="fa fa-pencil"></span> Ubah', $url, [
                                            'title' => Yii::t('app', 'update'),
                                            'class'=>'btn btn-warning btn-xs modal-form',
                                            'data-size' => 'modal-lg',

                                ]);
                            },
                            'password' => function ($url, $model) {
                                return Html::a('<span class="fa fa-key"></span> Reset Password', $url, [
                                            'title' => Yii::t('app', 'Reset Password/ Kata Sandi'),
                                            'class'=>'btn btn-danger btn-xs modal-form',
                                            'data-size' => 'modal-lg',

                                ]);
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
