<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPoskoModel */

$this->title = implode(' - ', [$model->nama_warga,$model->nik]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Pantauan Posko'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-posko-model-view box box-primary">
    <div class="box-header">
        <?php if(\yii::$app->user->identity->userType==\app\models\User::LEVEL_POSKO):?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif;?>

        <?php if(\yii::$app->user->identity->userType==\app\models\User::LEVEL_ADMIN):?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-flat',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif;?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= $this->render('_view',[
            'model'=>$model,
        ]);?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
            echo $this->render('history/index',[
                'searchModel' =>$searchModel,
                'dataProvider' =>$dataProvider,
            ]);
        ?>    
    </div>    
</div>
