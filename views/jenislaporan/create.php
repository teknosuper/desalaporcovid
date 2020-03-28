<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisLaporanModel */

$this->title = Yii::t('app', 'Create Jenis Laporan Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Laporan Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-laporan-model-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
