<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\form\DataPoskoHistoryForm */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Data Pantauan Harian',
]) . $model->tanggal;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Posko History Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dataPoskoHistoryBelongsToDataPoskoModel->nama_warga, 'url' => ['/dataposko/view', 'id' => $model->data_posko_id]];
$this->params['breadcrumbs'][] = $model->tanggal;
?>
<div class="data-posko-history-form-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<div class="data-posko-model-view box box-primary">
    <div class="box-body table-responsive no-padding">
        <?= $this->render('@app/views/dataposko/_view',[
            'model'=>$dataPoskoModel,
        ]);?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
            echo $this->render('index',[
                'searchModel' =>$searchModel,
                'dataProvider' =>$dataProvider,
            ]);
        ?>    
    </div>    
</div>
