<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataposkoController implements the CRUD actions for DataPoskoModel model.
 */
class ProfileController extends \app\controllers\MainController
{

	public function actionPassword()
	{
        $user_id = \yii::$app->user->identity->id; 
        $model = new \app\models\form\ChangePasswordForm;
        if ($model->load(Yii::$app->request->post())) {
            $user_model = \yii::$app->user->identity;
            $user_model->password = md5($model->new_password);
            $user_model->save();
            \Yii::$app->session->setFlash('success','Selamat Password Telah Berhasil Dirubah');
            return $this->redirect(['/profile/password']);
            // return $this->redirect(['view', 'id' => $model->id]);
        }
    	return $this->render('password',[
            'model'=>$model
        ]);
	}
}