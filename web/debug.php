<?php

function failed(){
	
	header('WWW-Authenticate: Basic realm="Privileged Area / Authorized User Only"');
  	header('HTTP/1.0 401 Unauthorized');
  	echo "Unauthorized Access";
  	die();
    
}

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
 
    $usr = $_SERVER['PHP_AUTH_USER'];
    $pwd = $_SERVER['PHP_AUTH_PW'];
 
    // Does the user want to login or logout?
    if (!($usr == 'masuk' && $pwd == 'debug')){
    	failed();
    }

 }else{
 	failed();
 }
error_reporting(E_ALL);
ini_set('display_errors', '1');
set_time_limit ( 300 );

defined('YII_DEBUG') or define('YII_DEBUG', TRUE);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

$application = new yii\web\Application($config);
$application->run();
