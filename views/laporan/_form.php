<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanModel */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
    $js = '$(".dependent-dropdown-input").on("change", function() {
        var value = $(this).val(),
            obj = $(this).attr("id"),
            next = $(this).attr("data-next");
            if(value==2)
            {
                $("#"+next).removeClass("hidden");
            }
            else if(value==1)
            {
                $("#"+next).addClass("hidden");             
            }
            else
            {
                $("#"+next).addClass("hidden");             
            }
            // $("#" + next).val(next);
    });';
    $jsTrigger = '$(".dependent-dropdown-input" ).trigger( "change" );';
    $this->registerJs($js);
    $this->registerJs($jsTrigger);
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
                                'placeholder' => 'Jenis Pelaporan',
                            ])
                            ->hint('<div style="width:200px"><b>Jenis Laporan </b> - Masukkan Jenis Pelaporan.</div>')
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
                            ->hint('<div style="width:200px"><b>Nomer Telepon Pelapor</b> - Masukkan Nomer Telepon Anda / nomor yang dapat dihubungi..</div>');?>
                        </div>
                    </div>            
                </div>
            </div>

        </div>  

        <div class="box-header with-border text-center">
          <h3 class="box-title">Isi Biodata Warga Terlapor Sesuai Kartu Identitas</h3>

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
                                    'initValueText' => \app\models\KelurahanModel::getTextKelurahanById($model->kelurahan),                        
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
                                'addon' => ['append' => ['content'=>'<i class="fa fa-address"></i>']],
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
                                'placeholder' => 'Nomer Telepon Warga Terlapor / yang dapat dihubungi',
                            ])
                            ->hint('<div style="width:200px"><b>Kelurahan </b> - Nomer Telepon Warga Terlapor / nomor yang dapat dihubungi.</div>');?>
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
                            <?= $form->field($model, 'luar_negeri', [
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
                                ->hint('<div style="width:200px"><b>Apakah dari Luar Negeri ? </b></div>')
                                ->dropDownList([1=>'Tidak',2=>'Iya'],
                                [
                                    // 'prompt'=>'Pilih ',
                                    'id'=>'luar_negeri',
                                    'class'=>'dependent-dropdown-input form-control',
                                    'data-next'=>'id_negara',
                                ]);?>
                        </div>
                    </div>                

                    <div class="col-md-6 hidden" id="id_negara">
                        <div class="form-group">
                            <?= $form->field($model, 'id_negara', [
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
                                    'initValueText' => \app\models\NegaraModel::getTextNegaraById($model->id_negara),                        
                                    'options' => [
                                        'placeholder' => 'Pilih Negara ...',
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'minimumInputLength' => 4,
                                        'language' => [
                                            'errorLoading' => new JsExpression("function () { return 'Sedang mencari data...'; }"),
                                        ],
                                        'ajax' => [
                                            'url' => \yii\helpers\Url::to(['/site/getdatanegara']),
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                        ],
                                    ],
                                ])
                                ->hint('<div style="width:200px"><b>Negara </b> - Masukkan data Negara</div>');?>
                        </div>
                    </div> 
                </div>            
            </div> 

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
                                    'initValueText' => \app\models\KabupatenModel::getTextKabById($model->kota_asal),                        
                                    'options' => [
                                        'placeholder' => 'Pilih Kab/Kota Asal ...',
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
                                    'initValueText' => \app\models\KelurahanModel::getTextKelurahanById($model->kelurahan_datang),                        
                                    'options' => [
                                        'placeholder' => 'Pilih Kelurahan/Desa Tujuan ...',
                                        'id'=>'kelurahan_datang_id',
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
                                'addon' => ['append' => ['content'=>'<i class="fa fa-address"></i>']],
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
                                'placeholder' => 'Lengkapi Keterangan, misalnya : hari / jam atau keperluan',
                            ])
                            ->hint('<div style="width:200px"><b>Alamat </b> - Lengkapi Keterangan.</div>');?>
                        </div>
                    </div>                

                    <div class="col-md-6">
                        <div class="form-group">
                        <?php
                            echo $form->field($model, 'id_posko',[
                                'feedbackIcon' => [
                                        'default' => '',
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                ],
                                'hintType' => ActiveField::HINT_SPECIAL,
                                'addon' => ['append' => ['content'=>'<i class="fa fa-home"></i>']],
                                'hintSettings' => [
                                    'iconBesideInput' => false,
                                    'onLabelClick' => false,
                                    'onLabelHover' => true,
                                    'onIconClick' => true,
                                    'onIconHover' => false,
                                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                                ],
                            ])
                            ->widget(DepDrop::classname(), [
                                'options'=>['id'=>'posko_id'],
                                'pluginOptions'=>[
                                    'depends'=>['kelurahan_datang_id'],
                                    'placeholder'=>'Pilih Posko Terdekat...',
                                    'initialize' => true,
                                    'initDepends' => ['kelurahan_datang_id'],
                                    'url'=>Url::to(['/site/getposko','id'=>$model->id_posko])
                                ]
                            ])
                            ->hint('<div style="width:200px"><b>Posko </b> - Pilih Posko Terdekat.</div>');
                        ?>
                        </div>
                    </div> 
                </div>            
            </div> 

        </div>

        <?php 
            switch (\yii::$app->user->identity->userType) {
                case \app\models\User::LEVEL_ADMIN:
                case \app\models\User::LEVEL_ADMIN_DESA:
                case \app\models\User::LEVEL_POSKO:
                    echo $this->render('_form_validasi',[
                        'model'=>$model,
                        'form'=>$form,
                    ]);
                    # code...
                    break;
                default:

                    # code...
                    break;
            }
        ?>

        <div class="box-footer">
            <?= Html::submitButton(Yii::t('app', 'Kirim Laporan'), ['class' => 'btn btn-success btn-flat btn-block','data-method'=>'post','data-confirm'=>'Tekan OK untuk mengkonfirmasi data']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
