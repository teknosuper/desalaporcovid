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
                  <td><?= ($model->jenisLaporanBelongsToJenisLaporanModel) ? $model->jenisLaporanBelongsToJenisLaporanModel->nama_laporan : null;?></td>
                </tr>
                <tr>
                  <th>Nama Warga</th>
                  <th>:</th>
                  <td><?= $model->nama_warga;?></td>
                </tr>
                <tr>
                  <th>Kelurahan</th>
                  <th>:</th>
                  <td><?= ($model->kelurahanBelongsToKelurahanModel) ? $model->kelurahanBelongsToKelurahanModel->textKelurahan : null;?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <th>:</th>
                  <td><?= $model->alamat;?></td>
                </tr>
                <tr>
                  <th>No Telepon</th>
                  <th>:</th>
                  <td><?= $model->no_telepon;?></td>
                </tr>                
                <tr>
                  <th>Kota Asal </th>
                  <th>:</th>
                  <td><?= ($model->kotaAsalBelongsToKabupatenModel) ? implode(' - ', [$model->kotaAsalBelongsToKabupatenModel->nama]) : null;?></td>
                </tr>                
                <tr>
                  <th>Desa / Kelurahan Tujuan</th>
                  <th>:</th>
                  <td><?= ($model->kelurahanDatangBelongsToKelurahanModel) ? $model->kelurahanDatangBelongsToKelurahanModel->textKelurahan : null;?></td>
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
		<pagebreak />
