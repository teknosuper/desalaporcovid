<?php 
    $this->title = Yii::t('app', 'Desa Lapor Covid-19');
    $this->params['breadcrumbs'][] = $this->title;
?>


    <?php if(\yii::$app->user->isGuest):?>
        <?= $this->render('_dashboard_non_login');?>
    <?php else:?>

        <?php 
            switch (\yii::$app->user->identity->userType) {
                case \app\models\User::LEVEL_ADMIN:
                    echo $this->render('_dashboard_admin');
                    # code...
                    break;
                case \app\models\User::LEVEL_POSKO:
                case \app\models\User::LEVEL_PENGGUNA:
                    echo $this->render('_dashboard_login');
                    # code...
                    break;
                case \app\models\User::LEVEL_PENGGUNA:
                    echo $this->render('_dashboard_login_pengguna');
                    # code...
                    break;                
                default:

                    # code...
                    break;
            }

        ?>

    <?php endif;?>
    
    <div class="row">
        <div class="col-md-12">
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