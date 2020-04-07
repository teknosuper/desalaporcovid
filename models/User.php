<?php

namespace app\models;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\table\Users;

class User extends Users implements IdentityInterface 
{

    const STATUS_DELETED = 30;
    const STATUS_ACTIVE = 10;
    const STATUS_SUSPENDED = 0;

    const GENDER_L = 'L';
    const GENDER_P = 'P';

    const LEVEL_POSKO = 'posko';
    const LEVEL_ADMIN = 'admin';
    const LEVEL_ADMIN_DESA = 'admin_desa';
    const LEVEL_PENGGUNA = 'pengguna';

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'accessToken' => Yii::t('app', 'Access Token'),
            'userType' => Yii::t('app', 'Tipe Pengguna'),
            'user_id' => Yii::t('app', 'Posko'),
            'status' => Yii::t('app', 'Status'),
            'nama' => Yii::t('app', 'Nama'),
            'kelurahan' => Yii::t('app', 'Kelurahan'),
            'alamat' => Yii::t('app', 'Alamat'),
            'gender' => Yii::t('app', 'Jenis Kelamin'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
        ];
    }

    public function getKelurahanText()
    {
        $kelurahan = $this->kelurahan;
        $cache = Yii::$app->cache;
        $cacheUniqueId = implode('-', ['getKelurahanText',$kelurahan]);
        $getCache = $cache->get($cacheUniqueId);
        if($getCache===FALSE)
        {       
            $returnData = ($this->kelurahanBelongsToKelurahanModel) ? implode(' - ', [$this->kelurahanBelongsToKelurahanModel->nama,$this->kelurahanBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama,$this->kelurahanBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->kecamatanBelongsToKabupatenModel->nama]) : null;     
           
                $getCache = $returnData;
                $cache->set($cacheUniqueId,$getCache,60*360);
        }

        $returnData = $getCache;
        return $returnData;
    }

    public function getPoskoText()
    {
        $id_posko = $this->user_id;
        $cache = Yii::$app->cache;
        $cacheUniqueId = implode('-', ['getPoskoText',$id_posko]);
        $getCache = $cache->get($cacheUniqueId);
        if($getCache===FALSE)
        {       
            $returnData = ($this->idPoskoToPoskoModel) ? $this->idPoskoToPoskoModel->textPosko : null;  

                $getCache = $returnData;
                $cache->set($cacheUniqueId,$getCache,60*360);
        }

        $returnData = $getCache;
        return $returnData;
    }

    public function getLevelDetail()
    {
        $status = $this->userType;
        $array = self::getLevelList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

    public static function getLevelList()
    {
        switch (\yii::$app->user->identity->userType) {
            case \app\models\User::LEVEL_ADMIN:
                return [
                    self::LEVEL_PENGGUNA=>"PENGGUNA",
                    self::LEVEL_POSKO=>"POSKO",
                    self::LEVEL_ADMIN_DESA=>"ADMIN DESA",
                    self::LEVEL_ADMIN=>"ADMIN",
                ];
                # code...
                break;
            case \app\models\User::LEVEL_ADMIN_DESA:
                return [
                    self::LEVEL_PENGGUNA=>"PENGGUNA",
                    self::LEVEL_POSKO=>"POSKO",
                    self::LEVEL_ADMIN_DESA=>"ADMIN DESA",
                ];
                # code...
                break;            
            default:
                return [
                    self::LEVEL_PENGGUNA=>"PENGGUNA",
                    self::LEVEL_POSKO=>"POSKO",
                ];
                # code...
                break;
        }

    }

    public function getGenderDetail()
    {
        $status = $this->gender;
        $array = self::getGenderList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

    public static function getGenderList()
    {
        return [
            self::GENDER_L=>"LAKI-LAKI",
            self::GENDER_P=>"PEREMPUAN",
        ];
    }


    public function getStatusDetail()
    {
        $status = $this->status;
        $array = self::getStatusList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_ACTIVE=>"ACTIVE",
            self::STATUS_SUSPENDED=>"SUSPENDED",
            self::STATUS_DELETED=>"DELETED",
        ];
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public function getNamaKelurahan()
    {
        return (\yii::$app->user->identity->kelurahanBelongsToKelurahanModel) ?  \yii::$app->user->identity->kelurahanBelongsToKelurahanModel->nama : "?" ;
    }

    public function getKelurahanBelongsToKelurahanModel()
    {
        return $this->hasOne(KelurahanModel::className(),['id_kel'=>'kelurahan']);
    }

    public function getIdPoskoToPoskoModel()
    {
        return $this->hasOne(PoskoModel::className(),['id'=>'user_id']);
    }

    public static function getPenggunaCount()
    {
        if(\yii::$app->user->isGuest)
        {
            return self::find()->count();           
        }
        else
        {
            $kelurahan_id = \yii::$app->user->identity->kelurahan;
            $model = self::find()->where([
                'kelurahan'=>$kelurahan_id,
            ])->count();            
            return $model;
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        // return $this->password === $password;
        return $this->password === md5($password);
    }
}
