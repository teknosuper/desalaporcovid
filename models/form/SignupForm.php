<?php
namespace app\models\form;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $nama;
    public $no_telepon;
    public $username;
    public $password;
    public $confirm_password;
    public $email;
    public $kelurahan;
    public $alamat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama','no_telepon','username','password','confirm_password','email','kelurahan','alamat'],'safe'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Email sudah pernah didaftarkan'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Username tidak tersedia, coba ganti yang lain'],
            ['no_telepon', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Nomer Telepon tidak tersedia, coba ganti yang lain'],
            ['password', 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute' => 'password'],
            [['username','nama','password','confirm_password','nama','email'], 'required','on'=>'step1'],
            [['no_telepon','kelurahan','alamat'],'required','on'=>'step2'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['step1'] = ['username','nama','password','confirm_password','nama','email'];
        $scenarios['step2'] = ['no_telepon','kelurahan','alamat'];
        return $scenarios;
    }

    public function attributeLabels()
    {
        return [
            'nama' => Yii::t('app', 'Nama'),
            'no_telepon' => Yii::t('app', 'No. Telepon (HP)'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Kata Sandi'),
            'confirm_password' => Yii::t('app', 'Konfirmasi Kata Sandi'),
            'email' => Yii::t('app', 'Alamat Email'),
            'kelurahan' => Yii::t('app', 'Kelurahan / Desa'),
            'alamat' => Yii::t('app', 'Alamat Lengkap'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

    public function signup()
    {

        $userModel = new \app\models\User;
        $userModel->nama = $this->nama;
        $userModel->username = $this->username;
        $userModel->password = md5($this->password);
        $userModel->authKey = \Yii::$app->security->generateRandomString();
        $userModel->email = $this->email;
        $userModel->kelurahan = $this->kelurahan;
        $userModel->created_at = date('Y-m-d H:i:s');
        $userModel->alamat = $this->alamat; 
        $userModel->userType = \app\models\User::LEVEL_PENGGUNA;
        $userModel->status = \app\models\User::STATUS_ACTIVE;

        
        if($userModel->validate())
        {
            $userModel->save();

            return $userModel;
        }
        else
        {
            return false;
        }
    }
}
