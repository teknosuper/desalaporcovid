<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends \app\controllers\MainController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionGetposko()
    {
        $output = [];
        $selected = '';
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            $selected = $_POST['depdrop_parents'];
            $model = \app\models\PoskoModel::find()->where(['id_kelurahan'=>$parents])->all();
            $output = [];
            if($model)
            {
                foreach($model as $modelData)
                {
                    $nama = $modelData->nama_posko;
                    $kelurahan = $modelData->poskoBelongsToKelurahanModel->nama;
                    $kecamatan = $modelData->poskoBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama;
                    $output[] = [
                        'id'=>$modelData->id,
                        'name'=>implode(' - ', [$nama,$kelurahan,$kecamatan]),
                    ];                
                }

            }            
        }
        $output = ['output'=>$output, 'selected'=>\yii::$app->request->get('id')];
        return json_encode($output);
        // echo '{"output":[{"id":1,"name":"eBooks"},{"id":2,"name":"Music"},{"id":3,"name":"Movies"},{"id":4,"name":"Games"},{"id":5,"name":"Stationery"}],"selected":""}';
    }

    public function actionGetdatanegara($q=null,$id=null)
    {
        if(!is_null($q)) 
        {
            $model = \app\models\NegaraModel::find()
                ->where(['like','nama',$q])
                ->all();
            if($model and strlen($q)>3)
            {
                foreach($model as $modelData)
                {
                    $nama = $modelData->nama;
                    $kode_negara = $modelData->kode_negara;
                    $returnData[] = [
                        'id'=>$modelData->id,
                        'text'=>implode(' - ',[$nama,$kode_negara]),
                    ];
                }
            }
            else
            {
                $returnData = [];
            }
        }
        elseif($id > 0)
        {
            $model = \app\models\NegaraModel::find()->where(['id'=>$id])->one();
            if($model)
            {
                $nama = $model->nama;
                $kode_negara = $model->kode_negara;
                $returnData = [
                    'id'=>$model->id,
                    'text'=>implode(' - ',[$nama,$kode_negara]),
                ];
            }
            else
            {
                $returnData = [];               
            }
        }
        $returnDatas['results'] = $returnData;
        return json_encode($returnDatas);
    }

    public function actionGetdatakelurahan($q=null,$id=null)
    {
        if(!is_null($q)) 
        {
            $model = \app\models\KelurahanModel::find()
                ->where(['like','nama',$q])
                ->all();
            if($model and strlen($q)>3)
            {
                foreach($model as $modelData)
                {
                    $kelurahan = $modelData->nama;
                    $kecamatan = $modelData->kelurahanBelongsToKecamatanModel->nama;
                    $kabupaten = $modelData->kelurahanBelongsToKecamatanModel->kecamatanBelongsToKabupatenModel->nama;
                    $returnData[] = [
                        'id'=>$modelData->id_kel,
                        'text'=>implode(' - ',[$kelurahan,$kecamatan,$kabupaten]),
                    ];
                }
            }
            else
            {
                $returnData = [];
            }
        }
        elseif($id > 0)
        {
            $model = \app\models\KelurahanModel::find()->where(['id_kel'=>$id])->one();
            if($model)
            {
                $kelurahan = $model->nama;
                $kecamatan = $model->kelurahanBelongsToKecamatanModel->nama;
                $kabupaten = $model->kelurahanBelongsToKecamatanModel->kecamatanBelongsToKabupatenModel->nama;
                $returnData = [
                    'id'=>$model->id_kel,
                'text'=>implode(' - ',[$kelurahan,$kecamatan,$kabupaten]),
                ];
            }
            else
            {
                $returnData = [];               
            }
        }
        $returnDatas['results'] = $returnData;
        return json_encode($returnDatas);
    }

    public function actionGetdatakabupaten($q=null,$id=null)
    {
        if(!is_null($q)) 
        {
            $model = \app\models\KabupatenModel::find()
                ->where(['like','nama',$q])
                ->all();
            if($model and strlen($q)>3)
            {
                foreach($model as $modelData)
                {
                    $kabupaten = $modelData->nama;
                    $returnData[] = [
                        'id'=>$modelData->id_kab,
                        'text'=>implode(' - ',[$kabupaten]),
                    ];
                }
            }
            else
            {
                $returnData = [];
            }
        }
        elseif($id > 0)
        {
            $model = \app\models\KabupatenModel::find()->where(['id_kab'=>$id])->one();
            if($model)
            {
                $kabupaten = $model->nama;
                $returnData = [
                    'id'=>$model->id_kab,
                    'text'=>implode(' - ',[$kabupaten]),
                ];
            }
            else
            {
                $returnData = [];               
            }
        }
        $returnDatas['results'] = $returnData;
        return json_encode($returnDatas);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // return $this->redirect(['/laporan']);
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $this->layout = "main-login.php";
        $model = new LoginForm();
        return $this->render('signup',[
            'model'=> $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    //         Yii::$app->session->setFlash('contactFormSubmitted');

    //         return $this->refresh();
    //     }
    //     return $this->render('contact', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
