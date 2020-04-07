<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title">Data Posko <?= \yii::$app->user->identity->namaKelurahan;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive table-bordered">
              <table class="table table-hover">
                <tbody>
            	<tr>
            		<th>No.</th>
                  	<th>Jenis Laporan</th>
                  	<th>Nama Warga</th>
                  	<th>Kelurahan Asal</th>
                  	<th>Alamat</th>
                  	<th>Jenis Kelamin</th>
                  	<th>Usia</th>
                  	<th>Dari Luar Negeri</th>
                  	<th>Negara</th>
                  	<th>Kota Asal</th>
                  	<th>Status</th>
                </tr>
                <?php if($model):?>
                	<?php $no=1;?>
					<?php foreach($model as $modelData):?>
	                <tr>
	                	<td><?= $no++;?></td>
	                	<td><?= $modelData->jenisLaporanText;?></td>
	                	<td><?= $modelData->nama_warga;?></td>
	                	<td><?= $modelData->kelurahanText;?></td>
	                	<td><?= $modelData->alamat;?></td>
	                	<td><?= $modelData->genderDetail;?></td>
	                	<td><?= $modelData->usia;?></td>
	                	<td><?= $modelData->luarNegeriText;?></td>
	                	<td><?= $modelData->idNegaraText;?></td>
	                	<td><?= $modelData->kotaAsalText;?></td>
	                	<td><?= ($modelData->statusDetail) ? $modelData->statusDetail : null;?></td>
	                </tr>
		            <?php endforeach;?>
	            <?php endif;?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>