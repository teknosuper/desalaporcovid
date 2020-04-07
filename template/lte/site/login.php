<?php
use yii\helpers\Html;
// use yii\bootstrap\ActiveForm;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Masuk Aplikasi';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box panel panel-default">
    <div class="row text-center">
        <div class="login-logo">
            <img class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3 col-lg-6 col-lg-offset-3" src="/desalaporcovid-logo.png">
        </div>        
    </div>    

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="text-center alert alert-warning"><small> <i class="fa fa-warning"></i> Pengguna Baru Harap <a title="Tautan Mendaftar desalaporcovid.online" class="text-bold" href="<?= \yii\helpers\Url::toRoute(['/site/signup']);?>">Mendaftar</a> Terlebih Dahulu, Agar Anda Dapat Menggunakan Sistem ini</small></p>
        <p class="login-box-msg"><b>Halaman Login Aplikasi</b></p>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false,'options' => ['autocomplete' => 'off']]); ?>

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
                            'title' => '<i class="glyphicon glyphicon-info-sign"></i> Optional'
                        ]
                    ])
                    ->textInput([
                        'placeholder' => 'Wajib diisi',
                    ])
                    ->hint('<div style="width:200px"><b>Username </b> - Masukkan Username.</div>');?>
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
                        ->hint('<div style="width:200px"><b>Password </b> Masukkan Password</div>')
                        ->passwordInput([
                            'placeholder' => 'Wajib diisi',
                        ]);?>
                </div>
            </div>            
        </div>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <?= Html::submitButton('Masuk Aplikasi', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>

        <div class="social-auth-links text-center">
            <p>- Belum mempunyai akun ? -</p>
            <a href="<?= \yii\helpers\Url::toRoute(['/site/signup']);?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-user"></i> Daftar Aplikasi </a>
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
