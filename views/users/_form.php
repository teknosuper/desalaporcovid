<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

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
                                    'placeholder' => 'Nama',
                                ])
                                ->hint('<div style="width:200px"><b>Nama </b> - Masukkan Nama </div>');?>
                        </div>
                    </div>  
                </div>  

                <div class="row">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php if(\yii::$app->user->identity->userType==\app\models\User::LEVEL_ADMIN):?>
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
                                        'initValueText' => \app\models\KelurahanModel::getTextKelurahanById($model->id_kelurahan),                        
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
                            <?php else:?>
                                <?= $form->field($model, 'kelurahan')->textInput()->dropDownList(\app\models\KelurahanModel::getKelurahanListByIdKel(\yii::$app->user->identity->kelurahan)) ?>
                            <?php endif;?>
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

        <?php if($model->isNewRecord):?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        <?php endif;?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'userType')->textInput()->dropDownList(\app\models\User::getLevelList(),['prompt'=>'Pilih Tipe User']) ?>

                <div class="row">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php if(\yii::$app->user->identity->userType==\app\models\User::LEVEL_ADMIN):?>

                                <?= $form->field($model, 'user_id', [
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
                                        'initValueText' => \app\models\PoskoModel::getTextPoskoById($model->user_id),                        
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
                                    ])
                                    ->hint('<div style="width:200px"><b>Posko </b> - Masukkan data Posko</div>');?>

                            <?php else:?>
                                <?= $form->field($model, 'user_id')->textInput()->dropDownList(\app\models\PoskoModel::getPoskoListByIdKel(\yii::$app->user->identity->kelurahan)) ?>
                            <?php endif;?>
                        </div>
                    </div>  
                </div>  

        <?= $form->field($model, 'status')->textInput()->dropDownList(\app\models\User::getStatusList(),['prompt'=>'Pilih Status']) ?>


    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
