<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\PoskoModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posko-model-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'id_kelurahan', [
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

        <?= $form->field($model, 'nama_posko')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat_posko')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email_posko')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'status')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Simpan Data Posko'), ['class' => 'btn btn-success btn-flat btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
