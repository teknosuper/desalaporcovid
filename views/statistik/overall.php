<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Statistik');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistik-model-overall box box-primary">
    <section class="content">
          <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $jumlahLaporan;?></h3>

              <p>Total Laporan</p>
            </div>
            <div class="icon">
              <i class="fa fa-edit"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $jumlahPosko ;?></h3>

              <p>Total Posko</p>
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $jumlahDesa ;?></h3>

              <p>Jumlah Desa Pengguna App</p>
            </div>
            <div class="icon">
              <i class="fa fa-line-chart"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $jumlahKabKota;?></h3>

              <p>Jumlah Kota Pengguna App</p>
            </div>
            <div class="icon">
              <i class="fa fa-area-chart"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
</div>
