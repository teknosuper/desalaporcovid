<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoskoModel */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Posko Model',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posko Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="posko-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
