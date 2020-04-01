<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataPoskoModel */

$this->title = Yii::t('app', 'Tambah Data Pantauan Posko');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Pantauan Posko'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-posko-model-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
