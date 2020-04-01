<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property int $id_logs
 * @property int|null $user_id
 * @property string|null $action
 * @property int|null $action_id
 * @property string|null $data_serialize
 * @property string|null $created_time
 */
class LogsTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'action_id'], 'integer'],
            [['data_serialize'], 'string'],
            [['created_time'], 'safe'],
            [['action'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_logs' => Yii::t('app', 'Id Logs'),
            'user_id' => Yii::t('app', 'User ID'),
            'action' => Yii::t('app', 'Action'),
            'action_id' => Yii::t('app', 'Action ID'),
            'data_serialize' => Yii::t('app', 'Data Serialize'),
            'created_time' => Yii::t('app', 'Created Time'),
        ];
    }
}
