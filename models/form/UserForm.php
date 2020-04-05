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
            [['userType'],'validateUserType'],
        ];
    }

    public function validateUserType($attribute,$params,$validator)
    {
        $userType = $this->userType;
        switch ($userType) {
            case \app\models\User::LEVEL_ADMIN:
                switch (\yii::$app->user->identity->userType) {
                    case \app\models\User::LEVEL_ADMIN:

                        # code...
                        break;
                    
                    default:
                        $this->addError($attribute, "User Tipe Tidak Bisa Disimpan, silahkan Ulangi Lagi");
                        # code...
                        break;
                }
                # code...
                break;
            
            default:
                # code...
                break;
        }

        // $msisdn = $this->msisdn;
        // $tac = $this->$attribute;
        // $getTac = \common\helpers\CommonHelper::getTAC($msisdn.'-registration-bp-tac');
        // if($getTac != $tac)
        // {
        //     $this->addError($attribute, "{$tac} IS WRONG OTP, PLEASE CHECK YOUR OTP IN {$msisdn} SMS");
        // }
    }

}