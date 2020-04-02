<?php

namespace app\models\form;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class UserForm extends \app\models\User
{

    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password', 'email', 'nama', 'alamat'], 'string', 'max' => 255],
            [['authKey', 'accessToken'], 'string', 'max' => 32],
            [['userType'], 'string', 'max' => 50],
            [['kelurahan', 'no_telepon'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['email','userType','nama'], 'required'],
        ];
    }

}