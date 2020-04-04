<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\form\DataPoskoHistoryForm */

$this->title = implode(' - ', [$dataPoskoModel->nama_warga,$dataPoskoModel->nik]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Pantauan Posko'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['dataposko/view','id'=>$dataPoskoModel->id]];
$this->params['breadcrumbs'][] = 'Data Pantauan Harian';
?>

<div class="data-posko-history-form-create">

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
