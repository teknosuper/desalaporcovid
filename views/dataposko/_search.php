<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\form\DataPoskoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-posko-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama_warga') ?>

    <?= $form->field($model, 'kelurahan') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'no_telepon') ?>

    <?php // echo $form->field($model, 'jenis_laporan') ?>

    <?php // echo $form->field($model, 'kota_asal') ?>

    <?php // echo $form->field($model, 'kelurahan_datang') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'id_posko') ?>

    <?php // echo $form->field($model, 'luar_negeri') ?>

    <?php // echo $form->field($model, 'id_negara') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
