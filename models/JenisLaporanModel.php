<?php

namespace app\models;

use Yii;
use app\models\table\JenisLaporan;
use yii\helpers\ArrayHelper;

class JenisLaporanModel extends JenisLaporan
{

    const STATUS_ACTIVE = 10;
    const STATUS_DISABLED = 20;

    public function getStatusDetail()
    {
        $status = $this->status;
        $array = self::getStatusList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_ACTIVE=>"ACTIVE",
            self::STATUS_DISABLED=>"DISABLED",
        ];
    }

    public static function getJenisLaporanList()
    {
        $cache = Yii::$app->cache;
        $cacheUniqueId = implode('-', ['getJenisLaporanList']);
        $getCache = $cache->get($cacheUniqueId);
        if($getCache===FALSE)
        {    
            $model = self::find()->all();
            if ($model)
            {
                $returnData = ArrayHelper::map ($model, 'id', 'nama_laporan');
                $getCache = $returnData;
                $cache->set($cacheUniqueId,$getCache,60*360);
            }
            else
            {
                $returnData = [];
            }


        }
        $returnData = $getCache;
        return $returnData;

    }

    public function sendLogs($action="create")
    {
    	switch ($action) {
    		case 'create':
	            /* start  */
	            	$user_id = $this->created_by;
	            	$action = "create_jenis_laporan";
	            	$action_id = $this->id;
	            	$data = $this->toArray();
	            	$createLogs = \app\models\LogsModel::CreateLogs($user_id,$action,$action_id,$data);
	            /* end */
    			# code...
    			break;
    		case 'update':
	            /* start  */
	            	$user_id = $this->updated_by;
	            	$action = "update_jenis_laporan";
	            	$action_id = $this->id;
	            	$data = $this->toArray();
	            	$createLogs = \app\models\LogsModel::CreateLogs($user_id,$action,$action_id,$data);
	            /* end */
    			# code...
    			break;    		
    		default:
    			# code...
    			break;
    	}
    }


}