<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PoskoModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posko-model-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'id_kelurahan')->textInput() ?>

        <?= $form->field($model, 'nama_posko')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat_posko')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email_posko')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'status')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
