    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Total Posko Semua Desa/Kelurahan</span>
              <span class="info-box-number"><?= \app\models\PoskoModel::getPoskoCount();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Total Laporan Semua Desa/Kelurahan</span>
              <span class="info-box-number"><?= \app\models\LaporanModel::getLaporanCount();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

    </div>