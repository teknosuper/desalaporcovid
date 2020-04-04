<?php

namespace app\controllers;

use Yii;
use app\models\PoskoModel;
use app\models\form\PoskoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PoskoController implements the CRUD actions for PoskoModel model.
 */
class PoskoController extends \app\controllers\MainController
{

    /**
     * Lists all PoskoModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PoskoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        switch (\yii::$app->user->identity->userType) {
            case \app\models\User::LEVEL_ADMIN:
                # code...
                break;
            case \app\models\User::LEVEL_ADMIN_DESA:
                $id_kelurahan = \yii::$app->user->identity->kelurahan;
                $dataProvider->query->andWhere([
                    'id_kelurahan'=>$id_kelurahan,
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
     * Displays a single PoskoModel model.
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
     * Creates a new PoskoModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PoskoModel();

        $model->created_by = \yii::$app->user->identity->id;
        $model->created_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->sendLogs("create");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PoskoModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated_by = \yii::$app->user->identity->id;
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->sendLogs("update");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PoskoModel model.
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
     * Finds the PoskoModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PoskoModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        switch (\yii::$app->user->identity->userType) {
            case \app\models\User::LEVEL_ADMIN:
                if (($model = PoskoModel::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
                # code...
                break;
            case \app\models\User::LEVEL_ADMIN_DESA:
                $id_kelurahan = \yii::$app->user->identity->idPoskoToPoskoModel->id_kelurahan;
                if (($model = PoskoModel::find()->where(['id_kelurahan'=>$id_kelurahan,'id'=>$id])->one()) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
                $dataProvider->query->andWhere([
                    'id_kelurahan'=>$id_kelurahan,
                ]);                        
                # code...
                break;          
            default:

                # code...
                break;
        }

    }
}
