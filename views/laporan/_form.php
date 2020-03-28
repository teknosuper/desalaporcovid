<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-model-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nama_warga')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kelurahan')->textInput() ?>

        <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'no_telepon_pelapor')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'no_telepon_terlapor')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jenis_laporan')->textInput() ?>

        <?= $form->field($model, 'kota_asal')->textInput() ?>

        <?= $form->field($model, 'kelurahan_datang')->textInput() ?>

        <?= $form->field($model, 'status')->textInput() ?>

        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'id_pelapor')->textInput() ?>

        <?= $form->field($model, 'id_posko')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
