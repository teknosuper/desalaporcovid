<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\form\DataPoskoHistoryForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-posko-history-form-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <div class="col-md-12">
            <div class="row">
            	<div class="col-md-6">
	                <?= $form->field($model, 'tanggal', [
	                        'feedbackIcon' => [
	                                'default' => '',
	                                'success' => 'ok',
	                                'error' => 'exclamation-sign',
	                                'defaultOptions' => ['class'=>'text-primary']
	                        ],
	                        'hintType' => ActiveField::HINT_SPECIAL,
	                        'hintSettings' => [
	                            'iconBesideInput' => false,
	                            'onLabelClick' => false,
	                            'onLabelHover' => true,
	                            'onIconClick' => true,
	                            'onIconHover' => false,
	                            'title' => '<i class="glyphicon glyphicon-info-sign"></i> Wajib diisi'
	                        ]
	                    ])
	                    ->widget(DateTimePicker::classname(), [
	                        'options' => ['placeholder' => 'Tanggal ...'],
	                        'pluginOptions' => [
	                            'autoclose' => true,
	                            'format' => 'yyyy-mm-dd hh:ii',
	                        ],
	                        'readonly' => true,
	                    ])
	                    ->hint('<div style="width:200px"><b>Tanggal </b> - Tanggal Pantauan.</div>');?>            		
            	</div>
            	<div class="col-md-6">
			        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>            		
            	</div>

            </div>
        </div>


    </div>
    <div class="box-footer">
    	<?php if($model->isNewRecord):?>
	        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-save"></i> Simpan Data Pantauan Harian'), ['class' => 'btn btn-block btn-success btn-flat','data-method'=>'post','data-confirm'=>'Tekan OK untuk mengkonfirmasi data']) ?>
  		<?php else:?> 
	        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-save"></i> Ubah Data Pantauan Harian'), ['class' => 'btn btn-block btn-success btn-flat','data-method'=>'post','data-confirm'=>'Tekan OK untuk mengkonfirmasi data']) ?>  		 
    	<?php endif;?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
