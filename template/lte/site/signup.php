<?php
use yii\helpers\Html;
// use yii\bootstrap\ActiveForm;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;

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
        <p class="text-center alert alert-success"><small> <i class="fa fa-warning"></i> Pengguna Yang Sudah Terdaftar, Silahkan <a title="Tautan Mendaftar desalaporcovid.online" class="text-bold" href="<?= \yii\helpers\Url::toRoute(['/site/login']);?>">Login</a> dengan username dan password anda, Jika Lupa, silahkan hubungi admin desa masing-masing</small></p>
        <p class="login-box-msg"><b>Daftar Aplikasi</b></p>

        <?php $form = ActiveForm::begin(['id' => 'Signup-form', 'enableClientValidation' => false,'options' => ['autocomplete' => 'off']]); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
	                <?= $form->field($model, 'nama', [
	                        'feedbackIcon' => [
	                                'default' => '',
	                                'success' => 'ok',
	                                'error' => 'exclamation-sign',
	                                'defaultOptions' => ['class'=>'text-primary']
	                        ],
	                        'hintType' => ActiveField::HINT_SPECIAL,
	                        'addon' => ['prepend' => ['content'=>'<i class="fa fa-user"></i>']],
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
	                        'placeholder' => 'Nama',
	                    ])
	                    ->hint('<div style="width:200px"><b>Nama </b> - Masukkan Nama </div>');?>
                </div>
            </div>            
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <?= $form->field($model, 'username', [
                        'feedbackIcon' => [
                                'default' => '',
                                'success' => 'ok',
                                'error' => 'exclamation-sign',
                                'defaultOptions' => ['class'=>'text-primary']
                        ],
                        'hintType' => ActiveField::HINT_SPECIAL,
                        'addon' => ['prepend' => ['content'=>'<i class="fa fa-user"></i>']],
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
                        'placeholder' => 'Wajib diisi',
                    ])
                    ->hint('<div style="width:200px"><b>Username </b> -Masukkan Username.</div>');?>
                </div>
            </div>            
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <?= $form->field($model, 'email', [
                        'feedbackIcon' => [
                                'default' => '',
                                'success' => 'ok',
                                'error' => 'exclamation-sign',
                                'defaultOptions' => ['class'=>'text-primary']
                        ],
                        'hintType' => ActiveField::HINT_SPECIAL,
                        'addon' => ['prepend' => ['content'=>'<i class="fa fa-envelope"></i>']],
                        'hintSettings' => [
                            'iconBesideInput' => false,
                            'onLabelClick' => false,
                            'onLabelHover' => true,
                            'onIconClick' => true,
                            'onIconHover' => false,
                            'title' => '<i class="glyphicon glyphicon-info-sign"></i> Optional'
                        ]
                    ])
                    ->textInput([
                        'placeholder' => 'Wajib diisi',
                    ])
                    ->hint('<div style="width:200px"><b>Email </b> - Enter Your Valid Email Address here.</div>');?>
                </div>
            </div>            
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($model, 'password', [
                            'feedbackIcon' => [
                                    'default' => '',
                                    'success' => 'ok',
                                    'error' => 'exclamation-sign',
                                    'defaultOptions' => ['class'=>'text-primary']
                            ],
                            'addon' => ['prepend' => ['content'=>'<i class="fa fa-lock"></i>']],
                            'hintType' => ActiveField::HINT_SPECIAL,
                            'hintSettings' => [
                                'iconBesideInput' => false,
                                'onLabelClick' => false,
                                'onLabelHover' => true,
                                'onIconClick' => true,
                                'onIconHover' => false,
                                'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                            ]
                        ])
                        ->hint('<div style="width:200px"><b>Password </b> enter your Password</div>')
                        ->passwordInput([
                            'placeholder' => 'Wajib diisi',
                        ]);?>
                </div>
            </div>            
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($model, 'confirm_password', [
                            'feedbackIcon' => [
                                    'default' => '',
                                    'success' => 'ok',
                                    'error' => 'exclamation-sign',
                                    'defaultOptions' => ['class'=>'text-primary']
                            ],
                            'addon' => ['prepend' => ['content'=>'<i class="fa fa-lock"></i>']],
                            'hintType' => ActiveField::HINT_SPECIAL,
                            'hintSettings' => [
                                'iconBesideInput' => false,
                                'onLabelClick' => false,
                                'onLabelHover' => true,
                                'onIconClick' => true,
                                'onIconHover' => false,
                                'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
                            ]
                        ])
                        ->hint('<div style="width:200px"><b>Confirm Password </b> Confirm your Password</div>')
                        ->passwordInput([
                            'placeholder' => 'Wajib diisi',
                        ]);?>
                </div>
            </div>            
        </div>


        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <?= Html::submitButton('Lanjutkan pendaftaran', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>

        <div class="social-auth-links text-center">
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
        <?php /*

        <a href="<?= \yii\helpers\Url::toRoute(['/forgot']);?>">I forgot my password</a><br>
        */ ?>
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
