<?php

namespace app\models;

use Yii;
use app\models\table\DataPoskoHistoryTable;

class DataPoskoHistoryModel extends DataPoskoHistoryTable
{

	public function getDataPoskoHistoryBelongsToDataPoskoModel()
	{
		return $this->hasOne(DataPoskoModel::className(),['id'=>'data_posko_id']);
	}

    public function getUpdatedByText()
    {
    	if($this->updatedByBelongsToUser)
    	{
	    	return implode(' - ', [$this->updatedByBelongsToUser->nama,$this->updatedByBelongsToUser->username]);
    	}
    	return null;
    }

    public function getCreatedByText()
    {
    	if($this->createdByBelongsToUser)
    	{
	    	return implode(' - ', [$this->createdByBelongsToUser->nama,$this->createdByBelongsToUser->username]);
    	}
    	return null;
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