<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PoskoModel */

$this->title = Yii::t('app', 'Tambah Daftar Posko');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Posko'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posko-model-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
