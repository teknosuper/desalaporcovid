<?php

namespace app\models;

use Yii;
use app\models\table\Notification;

class NotificationModel extends Notification
{

    /**
     * Default notification
     */
    const TYPE_DEFAULT = 'default';
    /**
     * Error notification
     */
    const TYPE_ERROR   = 'error';
    /**
     * Warning notification
     */
    const TYPE_WARNING = 'warning';
    /**
     * Success notification type
     */
    const TYPE_SUCCESS = 'success';

	public static function createNotification($key,$key_id,$user_id,$type = NotificationModel::TYPE_DEFAULT)
	{
		$model = new NotificationModel;
		$model->key = $key;
		$model->key_id = $key_id;
		$model->type = $type;
		$model->user_id = $user_id;
		$model->seen = 0;
		// $model->created_at = new \yii\db\Expression('NOW()');
        $model->created_at = date('Y-m-d H:i:s');
		$model->flashed = 0;
		if($model->save())
		{
			return $model;
		}
	}
}