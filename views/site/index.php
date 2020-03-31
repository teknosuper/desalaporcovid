<?php 
    $this->title = Yii::t('app', 'Desa Lapor Covid-19');
    $this->params['breadcrumbs'][] = $this->title;
?>

    
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Posko</span>
              <span class="info-box-number"><?= \app\models\PoskoModel::getPoskoCount();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Laporan</span>
              <span class="info-box-number"><?= \app\models\LaporanModel::getLaporanCount();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-ambulance"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pantauan</span>
              <span class="info-box-number"><?= \app\models\LaporanModel::getLaporanCount();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pengguna</span>
              <span class="info-box-number"><?= \app\models\User::getPenggunaCount();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">PERBEDAAN ODP, PDP, DAN SUSPECT VIRUS CORONA</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                        Orang Dalam Pemantauan (ODP)
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                      <b>Orang dengan status ODP belum menunjukan gejala sakit.</b>
                      <p>
                      Orang dikategori ini sempat berpergian ke negara atau sempat melakukan kontak dengan orang diduga positif corona sehingga harus dilakukan pemantauan.</p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                        Pasien Dalam Pengawasan (PDP)
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                      <b>Orang yang sudah menunjukan gejala terjangkit Covid-19, seperti demam, batuk, pilek, dan sesak napas.</b>
                      <p>PDP harus betul-betul diperlakukan dengan baik karena sudah menjadi pasien.</p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                        SUSPECT
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                        <b>Orang yang sudah menunjukkan gejala terjangkit korona dan juga diduga kuat melakukan kontak dengan pasien positif Covid-19.</b>
                        <p>Selanjutnya, pasien suspect Covid-19 akan diperiksa spesimennya menggunakan dua metode, Polymerase Chain Reaction (PCR) dan Genome Sequencing.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>        
    </div>