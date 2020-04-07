<?php 
use yii\widgets\DetailView;
?>

	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title">Dokumen Warga Pantauan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>Jenis Laporan</th>
                  <th>:</th>
                  <td><?= $model->jenisLaporanText;?></td>
                </tr>
                <tr>
                  <th>Nama Warga</th>
                  <th>:</th>
                  <td><?= $model->nama_warga;?></td>
                </tr>
                <tr>
                  <th>Kelurahan</th>
                  <th>:</th>
                  <td><?= $model->kelurahanText;?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <th>:</th>
                  <td><?= $model->alamat;?></td>
                </tr>                
                <tr>
                  <th>Jenis Kelamin</th>
                  <th>:</th>
                  <td><?= ($model->genderDetail) ? $model->genderDetail : null;?></td>
                </tr>                
                <tr>
                  <th>Usia</th>
                  <th>:</th>
                  <td><?= $model->usia;?></td>
                </tr>              
                <tr>
                  <th>Apakah Dari Luar Negeri ?</th>
                  <th>:</th>
                  <td><?= $model->luarNegeriText;?></td>
                </tr>                
                <tr>
                  <th>Negara</th>
                  <th>:</th>
                  <td><?= $model->idNegaraText;?></td>
                </tr>                
                <tr>
                  <th>Kota Asal </th>
                  <th>:</th>
                  <td><?= $model->kotaAsalText;?></td>
                </tr>                
                <tr>
                  <th>Desa / Kelurahan Tujuan</th>
                  <th>:</th>
                  <td><?= $model->kelurahanDatangText;?></td>
                </tr>
                <tr>
                  <th>Keterangan</th>
                  <th>:</th>
                  <td><?= $model->keterangan;?></td>
                </tr>                
                <tr>
                  <th>Posko</th>
                  <th>:</th>
                  <td><?= ($model->poskoBelongsToPoskoModel) ? $model->poskoBelongsToPoskoModel->textPosko : null;?></td>
                </tr>
                <tr>
                  <th>Status</th>
                  <th>:</th>
                  <td><?= ($model->statusDetail) ? $model->statusDetail : null;?></td>
                </tr>                
                <tr>
                  <th>Waktu Datang</th>
                  <th>:</th>
                  <td>
                  	<?php 
						$waktu_datang = date('d F Y H:i:s',strtotime($model->waktu_datang));
                        echo "<span class='badge'>{$waktu_datang}</span>";
                  	?>
                  </td>
                </tr>                
                <tr>
                  <th>Dibuat Oleh </th>
                  <th>:</th>
                  <td><?= ($model->createdByText) ? $model->createdByText : "-";?></td>
                </tr>
                <tr>
                  <th>Waktu Dibuat  </th>
                  <th>:</th>
                  <td><?= ($model->created_at) ? date('d F Y H:i:s',strtotime($model->created_at)) : "-";?></td>
                </tr>
                <tr>
                  <th>Diubah Oleh  </th>
                  <th>:</th>
                  <td><?= ($model->UpdatedByText) ? $model->UpdatedByText : "-";?></td>
                </tr>                
                <tr>
                  <th>Waktu Diubah</th>
                  <th>:</th>
                  <td><?= ($model->updated_at) ? date('d F Y H:i:s',strtotime($model->updated_at)) : "-";?></td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <?php if($model->dataPoskoHasManyDataPoskoHistoryModel):?>
  		<pagebreak />
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header text-center">
                  <h3 class="box-title">Dokumen Pantauan Harian Warga</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Waktu Pemantauan</th>
                        <th class="text-center">Petugas</th>
                      </tr>
                      <?php foreach($model->dataPoskoHasManyDataPoskoHistoryModel as $historyPoskoData):?>
                        <tr>
                          <td><?= date('d F Y H:i:s',strtotime($historyPoskoData->tanggal));?></td>
                          <td><?= $historyPoskoData->keterangan;?></td>
                          <td><?= date('d F Y H:i:s',strtotime($historyPoskoData->created_at));?></td>
                          <td><?= $historyPoskoData->createdByText;?></td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      <?php endif;?>