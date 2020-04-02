<?php

namespace app\models;

use Yii;
use app\models\table\LaporanTable;

class LaporanModel extends LaporanTable
{

    // const STATUS_DELETED = 20;
    const STATUS_WAITING = 10;
    const STATUS_ON_PROCESS = 30;
    const STATUS_PROCESSED = 40;
    const STATUS_NOT_VALID = 50;

	public function getCreatedByBelongsToUser()
	{
		return $this->hasOne(User::className(),['id'=>'created_by']);
	}

	public function getUpdatedByBelongsToUser()
	{
		return $this->hasOne(User::className(),['id'=>'updated_by']);
	}

	public function getKelurahanBelongsToKelurahanModel()
	{
		return $this->hasOne(KelurahanModel::className(),['id_kel'=>'kelurahan']);
	}

	public function getKelurahanDatangBelongsToKelurahanModel()
	{
		return $this->hasOne(KelurahanModel::className(),['id_kel'=>'kelurahan_datang']);
	}

	public function getKotaAsalBelongsToKabupatenModel()
	{
		return $this->hasOne(KabupatenModel::className(),['id_kab'=>'kota_asal']);
	}

	public function getJenisLaporanBelongsToJenisLaporanModel()
	{
		return $this->hasOne(JenisLaporanModel::className(),['id'=>'jenis_laporan']);
	}

	public function getPoskoBelongsToPoskoModel()
	{
		return $this->hasOne(PoskoModel::className(),['id'=>'id_posko']);
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
            // self::STATUS_DELETED=>"DI HAPUS",
            self::STATUS_WAITING=>"MENUNGGU DIPROSES",
            self::STATUS_ON_PROCESS=>"SEDANG DIPROSES",
            self::STATUS_PROCESSED=>"SUDAH DIPROSES",
            self::STATUS_NOT_VALID=>"DATA TIDAK VALID",
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama_warga' => Yii::t('app', 'Nama Warga'),
            'kelurahan' => Yii::t('app', 'Kelurahan / Desa'),
            'alamat' => Yii::t('app', 'Alamat Lengkap'),
            'no_telepon_pelapor' => Yii::t('app', 'No Telepon Pelapor'),
            'no_telepon_terlapor' => Yii::t('app', 'No Telepon Terlapor'),
            'jenis_laporan' => Yii::t('app', 'Jenis Laporan'),
            'kota_asal' => Yii::t('app', 'Kota Asal'),
            'kelurahan_datang' => Yii::t('app', 'Kelurahan Tujuan'),
            'status' => Yii::t('app', 'Status'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'id_pelapor' => Yii::t('app', 'Pelapor'),
            'id_posko' => Yii::t('app', 'Posko'),
            'luar_negeri' => Yii::t('app', 'Apakah Dari Luar Negeri ? '),
            'id_negara' => Yii::t('app', 'Negara'),
            'created_by' => Yii::t('app', 'Dibuat Oleh'),
            'updated_by' => Yii::t('app', 'Diubah Oleh'),
        ];
    }

    public static function getLaporanCount()
    {
    	if(\yii::$app->user->isGuest)
    	{
	    	return self::find()->count();    		
    	}
    	else
    	{
    		$kelurahan_id = \yii::$app->user->identity->kelurahan;
			$model = self::find()->where([
				'kelurahan_datang'=>$kelurahan_id,
			])->count();    		
			return $model;
    	}
    }

    public function sendNotification($action="create")
    {
    	switch ($action) {
    		case 'create':
	            /* start notification for user posko */
	            $allPoskoByKelurahan = $this->poskoBelongsToPoskoModel->poskoHasManyPoskoByKelurahan;
	            foreach($allPoskoByKelurahan as $allPoskoByKelurahanData)
	            {
	                $posko_id[] = $allPoskoByKelurahanData->id;
	            }
	            $userModel = \app\models\User::find()->where(['user_id'=>$posko_id,'userType'=>\app\models\User::LEVEL_POSKO])->all();
	            if($userModel)
	            {
	                foreach($userModel as $userModelData)
	                {
	                    \app\models\NotificationModel::createNotification(\app\models\Notification::KEY_LAPORAN_KE_POSKO, $this->id,$userModelData->id);                                    
	                }

	            }
	            /* end notification for user posko */
    			# code...
    			break;    		
			case 'update':
	            /* start notification for user */
	            switch ($this->status) {
	            	case self::STATUS_ON_PROCESS:
			            $user_id = $this->created_by;
		                \app\models\NotificationModel::createNotification(\app\models\Notification::KEY_UPDATE_LAPORAN_ON_PROCESS, $this->id,$user_id);	            
	            		# code...
	            		break;
	            	case self::STATUS_PROCESSED:
			            $user_id = $this->created_by;
		                \app\models\NotificationModel::createNotification(\app\models\Notification::KEY_UPDATE_LAPORAN_PROCESSED, $this->id,$user_id);	            
	            		# code...
	            		break;	            	
	            	case self::STATUS_NOT_VALID:
			            $user_id = $this->created_by;
		                \app\models\NotificationModel::createNotification(\app\models\Notification::KEY_UPDATE_LAPORAN_NOT_VALID, $this->id,$user_id);	            
	            		# code...
	            		break;		            		
	            	default:
	            		# code...
	            		break;
	            }

	            /* end notification for user */
    			# code...
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }

    public function sendLogs($action="create")
    {
    	switch ($action) {
    		case 'create':
	            /* start  */
	            	$user_id = $this->created_by;
	            	$action = "create_laporan";
	            	$action_id = $this->id;
	            	$data = $this->toArray();
	            	$createLogs = \app\models\LogsModel::CreateLogs($user_id,$action,$action_id,$data);
	            /* end */
    			# code...
    			break;
    		case 'update':
	            /* start  */
	            	$user_id = $this->updated_by;
	            	$action = "update_laporan";
	            	$action_id = $this->id;
	            	$data = $this->toArray();
	            	$createLogs = \app\models\LogsModel::CreateLogs($user_id,$action,$action_id,$data);
	            /* end */
    			# code...
    			break;    		
    		default:
    			# code...
    			break;
    	}
    }

}