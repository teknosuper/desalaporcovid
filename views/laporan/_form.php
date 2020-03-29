<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-model-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-solid box-primary">
        <div class="box-header with-border text-center">
          <h3 class="box-title">Isi Data Pelapor</h3>

        </div>
        <div class="box-body table-responsive">
            <div class="col-md-12">
                <div class="row">            
                    <div class="col-md-6">
                        <div class="form-group">
                        <?= $form->field($model, 'jenis_laporan', [
                                'feedbackIcon' => [
                                        'default' => '',
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                ],
                                'hintType' => ActiveField::HINT_SPECIAL,
                                'addon' => ['append' => ['content'=>'<i class="fa fa-file"></i>']],
                                'hintSettings' => [
                                    'iconBesideInput' => false,
                                    'onLabelClick' => false,
                                    'onLabelHover' => true,
                                    'onIconClick' => true,
                                    'onIconHover' => false,
                                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                                ]
                            ])
                            ->textInput([
                                'placeholder' => 'Nama Warga Yang akan dilaporkan',
                            ])
                            ->hint('<div style="width:200px"><b>Jenis Laporan </b> - Masukkan Nama Warga Yang akan dilaporkan.</div>')
                            ->dropDownList(\app\models\JenisLaporanModel::getJenisLaporanList(),['prompt'=>'Pilih Jenis Laporan']);?>
                        </div>
                    </div>            
                    <div class="col-md-6">
                        <div class="form-group">
                        <?= $form->field($model, 'no_telepon_pelapor', [
                                'feedbackIcon' => [
                                        'default' => '',
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                ],
                                'hintType' => ActiveField::HINT_SPECIAL,
                                'addon' => ['append' => ['content'=>'<i class="fa fa-phone"></i>']],
                                'hintSettings' => [
                                    'iconBesideInput' => false,
                                    'onLabelClick' => false,
                                    'onLabelHover' => true,
                                    'onIconClick' => true,
                                    'onIconHover' => false,
                                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                                ]
                            ])
                            ->widget('yii\widgets\MaskedInput', [
                                'mask' => '+6299999999999'
                            ])
                            ->textInput([
                                'placeholder' => 'Nomer Telepon Anda',
                            ])
                            ->hint('<div style="width:200px"><b>Kelurahan </b> - Masukkan Kelurahan.</div>');?>
                        </div>
                    </div>            
                </div>
            </div>

        </div>  

        <div class="box-header with-border text-center">
          <h3 class="box-title">Isi Biodata Warga Terlapor</h3>

        </div>
        <div class="box-body table-responsive">
            <div class="col-md-12">
                <div class="row">            
                    <div class="col-md-6">
                        <div class="form-group">
                        <?= $form->field($model, 'nama_warga', [
                                'feedbackIcon' => [
                                        'default' => '',
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                ],
                                'hintType' => ActiveField::HINT_SPECIAL,
                                'addon' => ['append' => ['content'=>'<i class="fa fa-user"></i>']],
                                'hintSettings' => [
                                    'iconBesideInput' => false,
                                    'onLabelClick' => false,
                                    'onLabelHover' => true,
                                    'onIconClick' => true,
                                    'onIconHover' => false,
                                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                                ]
                            ])
                            ->textInput([
                                'placeholder' => 'Nama Warga Yang akan dilaporkan',
                            ])
                            ->hint('<div style="width:200px"><b>Nama Warga </b> - Masukkan Nama Warga Yang akan dilaporkan.</div>');?>
                        </div>
                    </div>            
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'kelurahan', [
                                    'feedbackIcon' => [
                                            'default' => '',
                                            'success' => 'ok',
                                            'error' => 'exclamation-sign',
                                            'defaultOptions' => ['class'=>'text-primary']
                                    ],
                                    'hintType' => ActiveField::HINT_SPECIAL,
                                    'hintSettings' => [
                                        'iconBesideInput' => false,
                                        'onLabelClick' => false,
                                        'onLabelHover' => true,
                                        'onIconClick' => true,
                                        'onIconHover' => false,
                                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> Required'
                                    ]
                                ])
                                ->widget(Select2::classname(), [
                                    // 'initValueText' => $initText,
                                    'options' => [
                                        'placeholder' => 'Pilih Kelurahan/Desa ...',
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'minimumInputLength' => 4,
                                        'language' => [
                                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                        ],
                                        'ajax' => [
                                            'url' => \yii\helpers\Url::to(['/site/getdatakelurahan']),
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                        ],
                                    ],
                                ])
                                ->hint('<div style="width:200px"><b>Kelurahan </b> - Masukkan data kelurahan</div>');?>
                        </div>
                    </div>            
                </div>
            </div>  

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <?= $form->field($model, 'alamat', [
                                'feedbackIcon' => [
                                        'default' => '',
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                ],
                                'hintType' => ActiveField::HINT_SPECIAL,
                                'addon' => ['append' => ['content'=>'<i class="fa fa-pencil"></i>']],
                                'hintSettings' => [
                                    'iconBesideInput' => false,
                                    'onLabelClick' => false,
                                    'onLabelHover' => true,
                                    'onIconClick' => true,
                                    'onIconHover' => false,
                                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                                ]
                            ])
                            ->textInput([
                                'placeholder' => 'Alamat',
                            ])
                            ->hint('<div style="width:200px"><b>Alamat </b> - Masukkan Alamat Lengkap.</div>');?>
                        </div>
                    </div>   
                    <div class="col-md-6">
                        <div class="form-group">
                        <?= $form->field($model, 'no_telepon_terlapor', [
                                'feedbackIcon' => [
                                        'default' => '',
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                ],
                                'hintType' => ActiveField::HINT_SPECIAL,
                                'addon' => ['append' => ['content'=>'<i class="fa fa-phone"></i>']],
                                'hintSettings' => [
                                    'iconBesideInput' => false,
                                    'onLabelClick' => false,
                                    'onLabelHover' => true,
                                    'onIconClick' => true,
                                    'onIconHover' => false,
                                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                                ]
                            ])
                            ->widget('yii\widgets\MaskedInput', [
                                'mask' => '+6299999999999'
                            ])
                            ->textInput([
                                'placeholder' => 'Nomer Telepon Warga Terlapor',
                            ])
                            ->hint('<div style="width:200px"><b>Kelurahan </b> - Masukkan Kelurahan.</div>');?>
                        </div>
                    </div>                            
                </div>
            </div>   

        </div>

        <div class="box-header with-border text-center">
          <h3 class="box-title">Isi Keterangan Laporan</h3>

        </div>
        <div class="box-body table-responsive">

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'kota_asal', [
                                    'feedbackIcon' => [
                                            'default' => '',
                                            'success' => 'ok',
                                            'error' => 'exclamation-sign',
                                            'defaultOptions' => ['class'=>'text-primary']
                                    ],
                                    'hintType' => ActiveField::HINT_SPECIAL,
                                    'hintSettings' => [
                                        'iconBesideInput' => false,
                                        'onLabelClick' => false,
                                        'onLabelHover' => true,
                                        'onIconClick' => true,
                                        'onIconHover' => false,
                                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> Required'
                                    ]
                                ])
                                ->widget(Select2::classname(), [
                                    // 'initValueText' => $initText,
                                    'options' => [
                                        'placeholder' => 'Pilih Kab/Kota Asal ...',
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'minimumInputLength' => 4,
                                        'language' => [
                                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                        ],
                                        'ajax' => [
                                            'url' => \yii\helpers\Url::to(['/site/getdatakabupaten']),
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                        ],
                                    ],
                                ])
                                ->hint('<div style="width:200px"><b>Kab / Kota Asal </b> - Pilih Kab/Kota Asal ...</div>');?>
                        </div>
                    </div>                

                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'kelurahan_datang', [
                                    'feedbackIcon' => [
                                            'default' => '',
                                            'success' => 'ok',
                                            'error' => 'exclamation-sign',
                                            'defaultOptions' => ['class'=>'text-primary']
                                    ],
                                    'hintType' => ActiveField::HINT_SPECIAL,
                                    'hintSettings' => [
                                        'iconBesideInput' => false,
                                        'onLabelClick' => false,
                                        'onLabelHover' => true,
                                        'onIconClick' => true,
                                        'onIconHover' => false,
                                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> Required'
                                    ]
                                ])
                                ->widget(Select2::classname(), [
                                    // 'initValueText' => $initText,
                                    'options' => [
                                        'placeholder' => 'Pilih Kelurahan/Desa Tujuan ...',
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'minimumInputLength' => 4,
                                        'language' => [
                                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                        ],
                                        'ajax' => [
                                            'url' => \yii\helpers\Url::to(['/site/getdatakelurahan']),
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                        ],
                                    ],
                                ])
                                ->hint('<div style="width:200px"><b>Kelurahan </b> - Masukkan data kelurahan</div>');?>
                        </div>
                    </div> 
                </div>            
            </div> 

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <?= $form->field($model, 'keterangan', [
                                'feedbackIcon' => [
                                        'default' => '',
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                ],
                                'hintType' => ActiveField::HINT_SPECIAL,
                                'addon' => ['append' => ['content'=>'<i class="fa fa-pencil"></i>']],
                                'hintSettings' => [
                                    'iconBesideInput' => false,
                                    'onLabelClick' => false,
                                    'onLabelHover' => true,
                                    'onIconClick' => true,
                                    'onIconHover' => false,
                                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                                ]
                            ])
                            ->textInput([
                                'placeholder' => 'Alamat',
                            ])
                            ->hint('<div style="width:200px"><b>Alamat </b> - Masukkan Alamat Lengkap.</div>');?>
                        </div>
                    </div>                

                    <div class="col-md-6">
                        <div class="form-group">
                        <?= $form->field($model, 'id_posko', [
                                'feedbackIcon' => [
                                        'default' => '',
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                ],
                                'hintType' => ActiveField::HINT_SPECIAL,
                                'addon' => ['append' => ['content'=>'<i class="fa fa-pencil"></i>']],
                                'hintSettings' => [
                                    'iconBesideInput' => false,
                                    'onLabelClick' => false,
                                    'onLabelHover' => true,
                                    'onIconClick' => true,
                                    'onIconHover' => false,
                                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                                ]
                            ])
                            ->textInput([
                                'placeholder' => 'Alamat',
                            ])
                            ->hint('<div style="width:200px"><b>Alamat </b> - Masukkan Alamat Lengkap.</div>');?>
                        </div>
                    </div> 
                </div>            
            </div> 

        </div>

        <div class="box-footer">
            <?= Html::submitButton(Yii::t('app', 'Kirim Laporan'), ['class' => 'btn btn-success btn-flat btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
