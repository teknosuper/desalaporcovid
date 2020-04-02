<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoskoModel */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Data Posko',
]) . $model->nama_posko;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posko Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_posko, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="posko-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
