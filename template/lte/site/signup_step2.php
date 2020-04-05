<?php
use yii\helpers\Html;
// use yii\bootstrap\ActiveForm;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Pendaftaran Aplikasi Desa Lapor Covid-19';

?>

<div class="login-box panel panel-default">
    <div class="row text-center">
        <div class="login-logo">
            <img class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3 col-lg-6 col-lg-offset-3" src="/desalaporcovid-logo.png">
        </div>        
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><b>Pendaftaran Aplikasi Langkah ke-2</b></p>

        <?php $form = ActiveForm::begin(['id' => 'Signup-form2', 'enableClientValidation' => false,'options' => ['autocomplete' => 'off']]); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($model, 'no_telepon', [
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
                        ->hint('<div style="width:200px"><b>Nomer Telepon</b> - Masukkan Nomer Telepon Anda / nomor yang dapat dihubungi..</div>');?>
                </div>
            </div>            
        </div>

        <div class="row">
            <div class="col-md-12">
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

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                     <?= $form->field($model, 'alamat', [
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
                            ]
                        ])
                        ->textInput([
                            'placeholder' => 'Alamat',
                        ])
                        ->hint('<div style="width:200px"><b>Alamat </b> - Masukkan Alamat Lengkap.</div>');?>
                </div>
            </div>            
        </div>

        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <?= Html::submitButton('Konfirmasi pendaftaran', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button','data-method'=>'post','data-confirm'=>'Tekan OK untuk mengkonfirmasi data']) ?>
            </div>
            <!-- /.col -->
        </div>

        <div class="social-auth-links text-center">
            <a href="<?= \yii\helpers\Url::toRoute(['/site/signup']);?>" class="btn btn-xs btn-block btn-social btn-github btn-flat"><i class="fa fa-backward"></i> kembali ke Langkah Pertama</a>
            <p>- Sudah Mempunyai Akun ? -</p>
            <a href="<?= \yii\helpers\Url::toRoute(['/site/login']);?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-user"></i> ke Halaman Masuk Aplikasi</a>
        </div>

        <div class="row text-center">
            <div class="login-logo">
                <img class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3 col-lg-6 col-lg-offset-3" src="https://cekdiri.id/img/cekdirilogo-text.a204049c.png">
            </div>        
            </br>
            <span>desalaporcovid merupakan bagian dari <a href="https://cekdiri.id" target="__blank">cekdiri.id</a></span>
        </div>

        <?php ActiveForm::end(); ?>
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
