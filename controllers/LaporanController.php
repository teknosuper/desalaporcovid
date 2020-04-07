<?php

namespace app\controllers;

use Yii;
use app\models\form\LaporanForm;
use app\models\form\LaporanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LaporanController implements the CRUD actions for LaporanForm model.
 */
class LaporanController extends \app\controllers\MainController
{

    /**
     * Lists all LaporanForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LaporanSearch();
        switch (\yii::$app->user->identity->userType) {
            case \app\models\User::LEVEL_ADMIN:
                $searchModel->status = \app\models\LaporanModel::STATUS_WAITING;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                # code...
                break;
            case \app\models\User::LEVEL_ADMIN_DESA:
            case \app\models\User::LEVEL_POSKO:
                $searchModel->status = \app\models\LaporanModel::STATUS_WAITING;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $id_kelurahan = \yii::$app->user->identity->kelurahan;
                $dataProvider->query->andWhere([
                    'kelurahan_datang'=>$id_kelurahan,
                ]);                        
                # code...
                break;            
            default:
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere([
                    'id_pelapor'=>\yii::$app->user->identity->id,
                ]);
                # code...
                break;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LaporanForm model.
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
     * Creates a new LaporanForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new LaporanForm();

        $model->id_pelapor = \yii::$app->user->identity->id;
        $model->status = \app\models\form\LaporanForm::STATUS_WAITING;
        $model->created_at = date('Y-m-d H:i:s');
        $model->created_by = \yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            $model->sendNotification("create");
            $model->sendLogs("create");

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LaporanForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated_at = date('Y-m-d H:i:s');
        $model->updated_by = \yii::$app->user->identity->id;
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
     * Deletes an existing LaporanForm model.
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
     * Finds the LaporanForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LaporanForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaporanForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
