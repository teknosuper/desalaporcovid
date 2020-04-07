<?php

namespace app\controllers;

use Yii;
use app\models\form\DataPoskoForm;
use app\models\form\DataPoskoSearch;
use app\models\form\DataPoskoHistoryForm;
use app\models\form\DataPoskoHistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * DataposkoController implements the CRUD actions for DataPoskoForm model.
 */
class DataposkoController extends \app\controllers\MainController
{

    /**
     * Lists all DataPoskoForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DataPoskoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        switch (\yii::$app->user->identity->userType) {
            case \app\models\User::LEVEL_ADMIN:
                # code...
                break;
            case \app\models\User::LEVEL_ADMIN_DESA:
            case \app\models\User::LEVEL_POSKO:
                $id_kelurahan = \yii::$app->user->identity->kelurahan;

                $dataProvider->query->andWhere([
                    'kelurahan_datang'=>$id_kelurahan,
                ]);                        
                # code...
                break;            
            default:

                # code...
                break;
        }

        if(\yii::$app->request->get('cetak')==TRUE)
        {
            $username = \yii::$app->user->identity->username;
            $kelurahan = \yii::$app->user->identity->namaKelurahan;
            $site = \yii\helpers\Url::home(true);
            $date = implode(', ', [\app\models\CommonHelper::getIndonesianDayName(date('D')),date('d F Y H:i:s')]);
            $dataProvider->pagination=false;
            $model = $dataProvider->models; 
            // get your HTML raw content without any layouts or scripts
            $content = $this->renderPartial('_reportAll',[
                'model'=>$model
            ]);
            
            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE, 
                'filename'=>"dataposko-{$kelurahan}.pdf",
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_LANDSCAPE, 
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER, 
                // your html content input
                'content' => $content,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:18px}', 
                 // set mPDF properties on the fly
                'options' => ['title' => 'Detil Data Warga Pantauan'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>["Dokumen dicetak oleh : @{$username}, pada: {$date} - {$site}"], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            
            // return the pdf output as per the destination setting
            return $pdf->render(); 
        }
        else
        {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

    }

    /**
     * Displays a single DataPoskoForm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $username = \yii::$app->user->identity->username;
        $site = \yii\helpers\Url::home(true);
        $date = implode(', ', [\app\models\CommonHelper::getIndonesianDayName(date('D')),date('d F Y H:i:s')]);
        $model = $this->findModel($id);
        if(\yii::$app->request->get('cetak')==TRUE)
        {
            // get your HTML raw content without any layouts or scripts
            $content = $this->renderPartial('_reportView',[
                'model'=>$model
            ]);
            
            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE, 
                'filename'=>implode('-', [$model->nama_warga,$model->kelurahanBelongsToKelurahanModel->nama]).'.pdf',
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT, 
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER, 
                // your html content input
                'content' => $content,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:18px}', 
                 // set mPDF properties on the fly
                'options' => ['title' => 'Detil Data Warga Pantauan'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>["Dokumen dicetak oleh : @{$username}, pada: {$date} - {$site}"], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            
            // return the pdf output as per the destination setting
            return $pdf->render(); 
        }
        else
        {
            $searchModel = new DataPoskoHistorySearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andWhere([
                'data_posko_id'=>$model->id,
            ]);                        
            return $this->render('view', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionDataharian($id)
    {
        $dataPoskoModel = $this->findModel($id);                
        $searchModel = new DataPoskoHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new DataPoskoHistoryForm();
        $model->data_posko_id = $id;
        $model->created_by = \yii::$app->user->identity->id;
        $model->created_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/dataposko/view', 'id' => $model->data_posko_id]);
        } else {
            return $this->render('history/create', [
                'dataPoskoModel' => $dataPoskoModel,
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionUpdateharian($id)
    {
        $model = DataPoskoHistoryForm::find()->where([
            'id'=>$id,
        ])->one();
        $searchModel = new DataPoskoHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model->updated_by = \yii::$app->user->identity->id;
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/dataposko/view', 'id' => $model->data_posko_id]);
        } else {
            return $this->render('history/update', [
                'dataPoskoModel' => $model->dataPoskoHistoryBelongsToDataPoskoModel,
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }


    /**
     * Creates a new DataPoskoForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $laporan_id = \yii::$app->request->get('laporan_id');
        $checkLaporanId = \app\models\LaporanModel::find()->where([
            'id'=>$laporan_id,
            'status'=>\app\models\LaporanModel::STATUS_ON_PROCESS,
            'kelurahan_datang'=>\yii::$app->user->identity->kelurahan,
        ])->one();

        $model = new DataPoskoForm();
        if($checkLaporanId)
        {
            $model->jenis_laporan = $checkLaporanId->jenis_laporan;
            $model->nama_warga = $checkLaporanId->nama_warga;
            $model->kelurahan = $checkLaporanId->kelurahan;
            $model->alamat = $checkLaporanId->alamat;
            $model->no_telepon = $checkLaporanId->no_telepon_terlapor;
            $model->kota_asal = $checkLaporanId->kota_asal;
            $model->kelurahan_datang = $checkLaporanId->kelurahan_datang;
            $model->keterangan = $checkLaporanId->keterangan;
            $model->id_posko = $checkLaporanId->id_posko;
            $model->luar_negeri = $checkLaporanId->luar_negeri;
            $model->id_negara = $checkLaporanId->id_negara;
        }
        $model->kelurahan_datang = \yii::$app->user->identity->kelurahan;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /* start update laporan */
            if($checkLaporanId)
            {
                $checkLaporanId->status = \app\models\LaporanModel::STATUS_PROCESSED;
                $checkLaporanId->updated_at = date('Y-m-d H:i:s');
                $checkLaporanId->updated_by = \yii::$app->user->identity->id;
                if($checkLaporanId->save())
                {
                    /* start send notification */
                    $checkLaporanId->sendNotification("update");
                    $checkLaporanId->sendLogs("update");                
                    /* end send notification */
                }
                /* end update laporan */
            }
            $model->created_at = date('Y-m-d H:i:s');
            $model->created_by = \yii::$app->user->identity->id;
            $model->save();
            /* start send notification */
            $model->sendNotification("create");
            $model->sendLogs("create");
            /* end send notification */
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DataPoskoForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /* end update laporan */
            $model->updated_at = date('Y-m-d H:i:s');
            $model->updated_by = \yii::$app->user->identity->id;
            $model->save();
            /* start send notification */
            $model->sendNotification("update");
            $model->sendLogs("update");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DataPoskoForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->delete())
        {   
            $model->sendLogs('delete');
        }
        return $this->redirect(['index']);
    }

    public function actionDeleteharian($id)
    {
        $kelurahan_user = \yii::$app->user->identity->kelurahan;
        $model = \app\models\DataPoskoHistoryModel::find()->where([
            'id'=>$id,
        ])->one();
        if($model)
        {
            $kelurahanDataPosko = $model->dataPoskoHistoryBelongsToDataPoskoModel->kelurahan;
            
            switch (\yii::$app->user->identity->userType) {
                case \app\models\User::LEVEL_ADMIN:
                    if($model->delete())
                    {
                        $model->sendLogs('delete');
                    }
                    # code...
                    break;
                case \app\models\User::LEVEL_ADMIN_DESA:
                case \app\models\User::LEVEL_POSKO:
                    if($kelurahan_user==$kelurahanDataPosko)
                    {
                        if($model->delete())
                        {
                            $model->sendLogs('delete');
                        }
                    }
                    # code...
                    break;            
                default:
                    if($kelurahan_user==$kelurahanDataPosko)
                    {
                        if($model->delete())
                        {
                            $model->sendLogs('delete');
                        }
                    }
                    # code...
                    break;
            }

            return $this->redirect(['/dataposko/view', 'id' => $model->data_posko_id]);
        }
        return $this->redirect(['index']);
    }


    /**
     * Finds the DataPoskoForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataPoskoForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $kelurahan_user = \yii::$app->user->identity->kelurahan;
        switch (\yii::$app->user->identity->userType) {
            case \app\models\User::LEVEL_ADMIN:
                $model = DataPoskoForm::find()->where([
                    'id'=>$id,
                ])->one();
                # code...
                break;
            case \app\models\User::LEVEL_ADMIN_DESA:
            case \app\models\User::LEVEL_POSKO:
                $model = DataPoskoForm::find()->where([
                    'id'=>$id,
                    'kelurahan_datang'=>$kelurahan_user,
                ])->one();
                # code...
                break;            
            default:
                $model = DataPoskoForm::find()->where([
                    'id'=>$id,
                    'kelurahan_datang'=>$kelurahan_user,
                ])->one();
                # code...
                break;
        }
        if($model){
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
