<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PoskoModel */

$this->title = $model->nama_posko;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Posko'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posko-model-view box box-primary">
    <div class="box-header">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a(Yii::t('app', 'Kembali ke data'), ['index'], [
            'class' => 'btn btn-danger btn-flat',
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                [
                    'attribute' => 'id_kelurahan',
                    'value' => function ($model) {
                        return $model->kelurahanText;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'nama_posko',
                'alamat_posko',
                'email_posko:email',
                'keterangan:ntext',
                [
                    'attribute' => 'status',
                    'value' => function ($model) {
                        return $model->statusDetail;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                [
                    'attribute' => 'created_by',
                    'value' => function ($model) {
                        return $model->createdByText;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'created_at',
                [
                    'attribute' => 'updated_by',
                    'value' => function ($model) {
                        return $model->updatedByText;
                    },
                    // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                    // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
                ],
                'updated_at',
            ],
        ]) ?>
    </div>
</div>
