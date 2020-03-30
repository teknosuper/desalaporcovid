<?php 

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
/**
 * 
 */
class MainController extends Controller
{

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        // 'actions' => ['logout', 'index','update','transaction','usage'],
                        'allow' => $this->canAccessWithLogin(),
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

    public function CanAccessWithLogin() {
        $requestedRoute = (!empty($requestedRoute)) ? rtrim($requestedRoute, '/') : rtrim(\yii::$app->requestedRoute, '/');
        if ($requestedRoute !== "site/login") {
            if(!\yii::$app->user->identity)
            {
                return TRUE;
            }
            $pathInfo = \yii::$app->request->pathInfo;
            switch ($pathInfo) {
                case 'dataposko':
                    switch (\yii::$app->user->identity->userType) {
                    case \app\models\User::LEVEL_ADMIN:
                    case \app\models\User::LEVEL_POSKO:
                            return true;
                            # code...
                            break;
                        
                        default:
                            return false;
                            # code...
                            break;
                    }
                    # code...
                    break;
                case 'posko':
                    switch (\yii::$app->user->identity->userType) {
                    case \app\models\User::LEVEL_ADMIN:
                            return true;
                            # code...
                            break;
                        
                        default:
                            return false;
                            # code...
                            break;
                    }
                    # code...
                    break;                
                case 'jenislaporan':
                    switch (\yii::$app->user->identity->userType) {
                    case \app\models\User::LEVEL_ADMIN:
                            return true;
                            # code...
                            break;
                        
                        default:
                            return false;
                            # code...
                            break;
                    }
                    # code...
                    break;
                
                default:
                    return TRUE;
                    # code...
                    break;
            }
        }
    }
}

?>