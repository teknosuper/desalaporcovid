<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property string $key
 * @property string|null $key_id
 * @property string $type
 * @property int $user_id
 * @property int $seen
 * @property string $created_at
 * @property int $flashed
 *
 * @property Users $user
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'type', 'user_id', 'seen', 'created_at', 'flashed'], 'required'],
            [['user_id', 'seen', 'flashed'], 'integer'],
            [['created_at'], 'safe'],
            [['key', 'key_id', 'type'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'key_id' => Yii::t('app', 'Key ID'),
            'type' => Yii::t('app', 'Type'),
            'user_id' => Yii::t('app', 'User ID'),
            'seen' => Yii::t('app', 'Seen'),
            'created_at' => Yii::t('app', 'Created At'),
            'flashed' => Yii::t('app', 'Flashed'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
