<?php

namespace app\models;

use Yii;
use app\models\table\DataPoskoHistory;

class DataPoskoHistoryModel extends DataPoskoHistory
{

	public function getDataPoskoHistoryBelongsToDataPoskoModel()
	{
		return $this->hasOne(DataPoskoModel::className(),['id'=>'data_posko_id']);
	}

    public function getUpdatedByText()
    {
    	$updated_by = $this->updated_by;
        $cache = Yii::$app->cache;
        $cacheUniqueId = implode('-', ['DataPoskoHistoryModel',$updated_by]);
        $getCache = $cache->get($cacheUniqueId);
        if($getCache===FALSE)
        {    
	    	if($this->updatedByBelongsToUser)
	    	{
		    	$returnData = implode(' - ', [$this->updatedByBelongsToUser->nama,$this->updatedByBelongsToUser->username]);
	    	}
	    	else
	    	{
	    		$returnData = null;
	    	}

            $getCache = $returnData;
            $cache->set($cacheUniqueId,$getCache,60*360);
	    }
        $returnData = $getCache;
        return $returnData;
    }

    public function getCreatedByText()
    {
    	$created_by = $this->created_by;
        $cache = Yii::$app->cache;
        $cacheUniqueId = implode('-', ['DataPoskoHistoryModel',$created_by]);
        $getCache = $cache->get($cacheUniqueId);
        if($getCache===FALSE)
        {    	
	    	if($this->createdByBelongsToUser)
	    	{
		    	$returnData = implode(' - ', [$this->createdByBelongsToUser->nama,$this->createdByBelongsToUser->username]);
	    	}
	    	else
	    	{
	    		$returnData = null;
	    	}

            $getCache = $returnData;
            $cache->set($cacheUniqueId,$getCache,60*360);
	    }
        $returnData = $getCache;
        return $returnData;
    }

	public function getCreatedByBelongsToUser()
	{
		return $this->hasOne(User::className(),['id'=>'created_by']);
	}

	public function getUpdatedByBelongsToUser()
	{
		return $this->hasOne(User::className(),['id'=>'updated_by']);
	}

    public function sendLogs($action="create")
    {
    	switch ($action) {
    		case 'create':
	            /* start  */
	            	$user_id = $this->created_by;
	            	$action = "create_data_posko_history";
	            	$action_id = $this->id;
	            	$data = $this->toArray();
	            	$createLogs = \app\models\LogsModel::CreateLogs($user_id,$action,$action_id,$data);
	            /* end */
    			# code...
    			break;
    		case 'update':
	            /* start  */
	            	$user_id = $this->updated_by;
	            	$action = "update_data_posko_history";
	            	$action_id = $this->id;
	            	$data = $this->toArray();
	            	$createLogs = \app\models\LogsModel::CreateLogs($user_id,$action,$action_id,$data);
	            /* end */
    			# code...
    			break;    		
    		case 'delete':
	            /* start  */
	            	$user_id = \yii::$app->user->identity->id;
	            	$action = "delete_data_posko_history";
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