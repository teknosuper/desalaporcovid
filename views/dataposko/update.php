<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPoskoModel */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => '',
]) . implode(' - ', [$model->nama_warga,$model->nik]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Posko Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_warga, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="data-posko-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
