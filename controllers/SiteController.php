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

    public function actionGetdataposko($q=null,$id=null)
    {
        if(!is_null($q)) 
        {
            $model = \app\models\PoskoModel::find()
                ->where(['like','nama_posko',$q])
                ->all();
            if($model and strlen($q)>3)
            {
                foreach($model as $modelData)
                {
                    $nama_posko = $modelData->nama_posko;
                    $kelurahan = $modelData->poskoBelongsToKelurahanModel->nama;
                    $kecamatan = $modelData->poskoBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama;
                    $returnData[] = [
                        'id'=>$modelData->id,
                        'text'=>implode(' - ', [$nama_posko,$kelurahan,$kecamatan]),
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
            $model = \app\models\PoskoModel::find()->where(['id'=>$id])->one();
            if($model)
            {
                $nama_posko = $model->nama_posko;
                $kelurahan = $model->poskoBelongsToKelurahanModel->nama;
                $kecamatan = $model->poskoBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama;
                $returnData[] = [
                    'id'=>$modelData->id,
                    'text'=>implode(' - ', [$nama_posko,$kelurahan,$kecamatan]),
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
            $cache = Yii::$app->cache;
            $cacheUniqueId = implode('-', ['actionGetdatakelurahan',$q]);
            $getCache = $cache->get($cacheUniqueId);
            if($getCache===FALSE)
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

                $getCache = $returnData;
                $cache->set($cacheUniqueId,$getCache,60*360);
            }
            $returnData = $getCache;

        }
        elseif($id > 0)
        {
            $cache = Yii::$app->cache;
            $cacheUniqueId = implode('-', ['actionGetdatakelurahan',$id]);
            $getCache = $cache->get($cacheUniqueId);
            if($getCache===FALSE)
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
                $getCache = $returnData;
                $cache->set($cacheUniqueId,$getCache,60*360);
            }
            $returnData = $getCache;
        }
        $returnDatas['results'] = $returnData;
        return json_encode($returnDatas);
    }

    public function actionGetdatakabupaten($q=null,$id=null)
    {
        $returnData = [];
        if(!is_null($q)) 
        {
            $cache = Yii::$app->cache;
            $cacheUniqueId = implode('-', ['actionGetdatakabupaten',$q]);
            $getCache = $cache->get($cacheUniqueId);
            if($getCache===FALSE)
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
                    $kecamatanModel = \app\models\KecamatanModel::find()
                    ->where(['like','nama',$q])
                    ->all();
                    if($kecamatanModel and strlen($q)>3)
                    {
                        foreach($kecamatanModel as $kecamatanData)
                        {
                            $kab[$kecamatanData->id_kab][$kecamatanData->kecamatanBelongsToKabupatenModel->nama][] = $kecamatanData->nama;
                        }

                        foreach($kab as $kabKey=>$kabValue)
                        {
                            $kecamatanArray = [];
                            $kabValueKey = null;
                            foreach($kabValue as $kabValueKey=>$kabValueValue)
                            {
                                $kabValueKey = $kabValueKey;
                                $kecamatanArray = $kabValueValue;
                            }

                            $kecamatanImplode = implode(',', $kecamatanArray);

                            $returnData[] = [
                                'id'=>$kabKey,
                                'text'=>"{$kabValueKey} - Kec. ({$kecamatanImplode})",
                            ];                        
                        }
                    }

                }
    
                $getCache = $returnData;
                $cache->set($cacheUniqueId,$getCache,60*360);

            }
            $returnData = $getCache;
        }
        elseif($id > 0)
        {
            $cache = Yii::$app->cache;
            $cacheUniqueId = implode('-', ['actionGetdatakabupaten',$id]);
            $getCache = $cache->get($cacheUniqueId);
            if($getCache===FALSE)
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
                $getCache = $returnData;
                $cache->set($cacheUniqueId,$getCache,60*360);
            }
            $returnData = $getCache;    
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
        $step = \yii::$app->request->get('step');

        $step1Model = new \app\models\form\SignupForm(['scenario' => 'step1']);
        $step2Model = new \app\models\form\SignupForm(['scenario' => 'step2']);
        $step1session = \yii::$app->session->get('SignupUserStep1');
        if ($step1session) {
            $step1Model->load($step1session);
        }
        // $randomWord = \common\helpers\CommonHelper::randomCode(TRUE,6);

        $model = new \app\models\form\SignupForm;
        $model->load($step1session);

        switch ($step) {
            case 2:
                if (empty(\yii::$app->session->get('SignupUserStep1'))) {
                    return $this->redirect(['/site/signup', 'step' => 1]);
                }
                if ($step2Model->load(Yii::$app->request->post()))
                {
                    // $model->load(Yii::$app->request->post());
                    if($step2Model->validate())
                    {
                        $model->no_telepon = $step2Model->no_telepon;
                        $model->kelurahan = $step2Model->kelurahan;
                        $model->alamat = $step2Model->alamat;
                        // \yii::$app->session->set('SignupUserStep2', \yii::$app->request->post());
                        // $model->load($step2session);
                        if($model->signup())
                        {
                            \yii::$app->session->remove('SignupUserStep1');
                            \yii::$app->session->remove('SignupUserStep2');
                            $getUser = \app\models\User::findByUsername($model->username);
                            //do login
                            \Yii::$app->user->login($getUser, 1 ? 3600 * 24 * 30 : 0);
                            return $this->redirect(['/']);
                        }
                    }
                }
                return $this->render('signup_step2',[
                    'model' => $step2Model
                ]);
                # code...
                break;
            
            default:
                if ($step1Model->load(Yii::$app->request->post()))
                {
                    if($step1Model->validate())
                    {
                        \yii::$app->session->set('SignupUserStep1', \yii::$app->request->post());
                        return $this->redirect(['/site/signup', 'step' => 2]);
                    }
                }
                return $this->render('signup',[
                    'model' => $step1Model
                ]);
                # code...
                break;
        }
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
