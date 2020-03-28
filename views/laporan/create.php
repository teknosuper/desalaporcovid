<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LaporanModel */

$this->title = Yii::t('app', 'Create Laporan Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Laporan Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-model-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
