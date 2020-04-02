<?php

namespace app\controllers;

use Yii;
use app\models\form\DataPoskoForm;
use app\models\form\DataPoskoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            case \app\models\User::LEVEL_POSKO:
                $id_kelurahan = \yii::$app->user->identity->idPoskoToPoskoModel->id_kelurahan;
                $dataProvider->query->andWhere([
                    'kelurahan_datang'=>$id_kelurahan,
                ]);                        
                # code...
                break;            
            default:

                # code...
                break;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataPoskoForm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /* start update laporan */
            $checkLaporanId->status = \app\models\LaporanModel::STATUS_PROCESSED;
            $checkLaporanId->updated_time = date('Y-m-d H:i:s');
            $checkLaporanId->updated_by = \yii::$app->user->identity->id;
            if($checkLaporanId->save())
            {
                /* start send notification */
                $checkLaporanId->sendNotification("update");
                $checkLaporanId->sendLogs("update");                
                /* end send notification */
            }
            /* end update laporan */
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
        $this->findModel($id)->delete();

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
        if (($model = DataPoskoForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
