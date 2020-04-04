<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\form\DataPoskoHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data Pantauan Harian');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-posko-history-form-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a(Yii::t('app', 'Data Pantauan Harian Baru'), ['/dataposko/dataharian','id'=>\yii::$app->request->get('id')], ['class' => 'btn btn-success btn-flat','data-pjax'=>0]) ?>
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
                // 'data_posko_id',
                'tanggal',
                'keterangan:ntext',
                // 'created_by',
                // 'updated_by',
                // 'created_at',
                // 'updated_at',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '#',
                    'headerOptions' => ['style' => 'color:#337ab7;text-align:center;'],
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                            'view' => function ($url, $model) {
                            	$url = \yii\helpers\Url::to(['dataposko/hariandetail','id'=>$model->id]);
                                return Html::a('<span class="fa fa-eye"></span> Detail', $url, [
                                            'title' => Yii::t('app', 'view'),
                                            'class'=>'btn btn-success btn-xs modal-form',
                                            'data-size' => 'modal-lg',
                                ]);
                            },

                            'update' => function ($url, $model) {
                            	$url = \yii\helpers\Url::to(['dataposko/updateharian','id'=>$model->id]);
                                return Html::a('<span class="fa fa-pencil"></span> Ubah', $url, [
                                            'title' => Yii::t('app', 'update'),
                                            'class'=>'btn btn-warning btn-xs modal-form',
                                            'data-size' => 'modal-lg',

                                ]);
                            },
                            'delete' => function ($url, $model) {
                            	$url = \yii\helpers\Url::to(['dataposko/deleteharian','id'=>$model->id]);
                                return Html::a('<span class="glyphicon glyphicon-trash"></span> Hapus', $url, [
                                            'title' => Yii::t('app', 'delete'),
                                            'class'=>'btn btn-danger btn-xs modal-form',
                                            'data-method'=>'post',
                                            'data-confirm'=>'Apakah anda yakin akan menghapus data ini ? ',
                                ]);
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
