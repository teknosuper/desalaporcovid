<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;

/* @var $this yii\web\View */
/* @var $model app\models\JenisLaporanModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-laporan-model-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nama_laporan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <?= $form->field($model, 'status', [
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
                        ->hint('<div style="width:200px"><b>Status </b> : Pilih Jenis Laporan</div>')
                        ->dropDownList(\app\models\JenisLaporanModel::getStatusList(),['prompt'=>'Pilih Jenis Laporan'])
                    ;?>
                </div>
            </div>              
        </div>
        <?= $form->field($model, 'status')->textInput() ?>

        <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
