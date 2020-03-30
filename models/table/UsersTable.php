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
 */
class UsersTable extends \yii\db\ActiveRecord
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
            [['user_id', 'status'], 'integer'],
            [['username', 'password', 'email', 'nama', 'alamat'], 'string', 'max' => 255],
            [['authKey', 'accessToken'], 'string', 'max' => 32],
            [['userType'], 'string', 'max' => 50],
            [['kelurahan'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
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
        ];
    }
}
