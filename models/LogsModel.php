<?php

namespace app\models;

use Yii;
use app\models\table\LogsTable;

class LogsModel extends LogsTable
{
	public static function CreateLogs($user_id,$action,$action_id,$data)
	{
		$model = new LogsModel;
		$model->user_id = $user_id;
		$model->action = $action;
		$model->action_id = $action_id;
		$model->data_serialize = serialize($data);
		$model->created_time = date('Y-m-d H:i:s');
		$model->save();
	}

}