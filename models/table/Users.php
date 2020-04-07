<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $authKey
 * @property string|null $password
 * @property string|null $email
 * @property string|null $accessToken
 * @property string|null $userType
 * @property int|null $user_id
 * @property int|null $status
 * @property string|null $nama
 * @property string|null $kelurahan
 * @property string|null $alamat
 * @property string|null $no_telepon
 * @property string|null $gender
 * @property string|null $tanggal_lahir
 * @property string|null $tempat_lahir
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property DataPosko[] $dataPoskos
 * @property DataPosko[] $dataPoskos0
 * @property DataPoskoHistory[] $dataPoskoHistories
 * @property DataPoskoHistory[] $dataPoskoHistories0
 * @property Laporan[] $laporans
 * @property Laporan[] $laporans0
 * @property Laporan[] $laporans1
 * @property Logs[] $logs
 * @property Notification[] $notifications
 * @property Posko[] $poskos
 * @property Posko[] $poskos0
 * @property Users $createdBy
 * @property Users[] $users
 * @property Users $updatedBy
 * @property Users[] $users0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['tanggal_lahir', 'created_at', 'updated_at'], 'safe'],
            [['username', 'password', 'email', 'nama', 'alamat', 'tempat_lahir'], 'string', 'max' => 255],
            [['authKey', 'accessToken'], 'string', 'max' => 32],
            [['userType'], 'string', 'max' => 50],
            [['kelurahan', 'no_telepon'], 'string', 'max' => 20],
            [['gender'], 'string', 'max' => 2],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'accessToken' => Yii::t('app', 'Access Token'),
            'userType' => Yii::t('app', 'User Type'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
            'nama' => Yii::t('app', 'Nama'),
            'kelurahan' => Yii::t('app', 'Kelurahan'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_telepon' => Yii::t('app', 'No Telepon'),
            'gender' => Yii::t('app', 'Gender'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[DataPoskos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPoskos()
    {
        return $this->hasMany(DataPosko::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[DataPoskos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPoskos0()
    {
        return $this->hasMany(DataPosko::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[DataPoskoHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPoskoHistories()
    {
        return $this->hasMany(DataPoskoHistory::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[DataPoskoHistories0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPoskoHistories0()
    {
        return $this->hasMany(DataPoskoHistory::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[Laporans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans()
    {
        return $this->hasMany(Laporan::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Laporans0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans0()
    {
        return $this->hasMany(Laporan::className(), ['id_pelapor' => 'id']);
    }

    /**
     * Gets query for [[Laporans1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans1()
    {
        return $this->hasMany(Laporan::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[Logs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Logs::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Poskos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoskos()
    {
        return $this->hasMany(Posko::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Poskos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoskos0()
    {
        return $this->hasMany(Posko::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[Users0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(Users::className(), ['updated_by' => 'id']);
    }
}
