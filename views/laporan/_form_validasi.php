<?php 
use kartik\form\ActiveForm;
use kartik\form\ActiveField;

?>

        <div class="box-header with-border text-center">
          <h3 class="box-title">Validasi Dari Posko Terkait</h3>

        </div>
        <div class="box-body table-responsive">

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'status', [
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
                                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> Required'
                                    ]
                                ])
                                ->hint('<div style="width:200px"><b>Status </b></div>')
                                ->dropDownList(\app\models\LaporanModel::getStatusUpdateList(),['prompt'=>'Pilih Status Laporan'])
                            ;?>
                        </div>
                    </div>   

                </div>
            </div>
        </div>