<?php

namespace app\models;

use Yii;
use app\models\table\DataPoskoTable;

class DataPoskoModel extends DataPoskoTable
{


    // const STATUS_DELETED = 20;
    const STATUS_DALAM_PEMANTAUAN = 10;
    const STATUS_GEJALA = 20;
    const STATUS_POSITIF = 30;
    const STATUS_SEMBUH = 40;
    const STATUS_PERGI = 50;
    const STATUS_NEGATIF = 60;

    public static function getDataPoskoCount()
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
            self::STATUS_DALAM_PEMANTAUAN=>"ODP (Orang Dalam Pemantauan)",
            self::STATUS_GEJALA=>"PDP (Pasien Dalam Pemantauan)",
            self::STATUS_POSITIF=>"STATUS POSITIF",
            self::STATUS_SEMBUH=>"STATUS SEMBUH",
            self::STATUS_PERGI=>"STATUS PERGI",
            self::STATUS_NEGATIF=>"STATUS NEGATIF",
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nik' => Yii::t('app', 'NIK'),
            'nama_warga' => Yii::t('app', 'Nama Warga'),
            'kelurahan' => Yii::t('app', 'Kelurahan'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_telepon' => Yii::t('app', 'No Telepon'),
            'jenis_laporan' => Yii::t('app', 'Jenis Laporan'),
            'kota_asal' => Yii::t('app', 'Kota Asal'),
            'kelurahan_datang' => Yii::t('app', 'Desa/Kelurahan Tujuan'),
            'status' => Yii::t('app', 'Status'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'id_posko' => Yii::t('app', 'Posko'),
            'luar_negeri' => Yii::t('app', 'Apakah Dari Luar Negeri ? '),
            'id_negara' => Yii::t('app', 'Negara'),
            'created_at' => Yii::t('app', 'Waktu Dibuat'),
            'created_by' => Yii::t('app', 'Dibuat Oleh'),
            'updated_at' => Yii::t('app', 'Waktu Diubah'),
            'updated_by' => Yii::t('app', 'Diubah Oleh'),
        ];
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
	                	switch ($this->status) {
	                		case self::STATUS_DALAM_PEMANTAUAN:
	                			$notif_type = \app\models\Notification::KEY_CREATE_STATUS_DALAM_PEMANTAUAN;
	                			# code...
	                			break;
	                		case self::STATUS_GEJALA:
	                			$notif_type = \app\models\Notification::KEY_CREATE_STATUS_GEJALA;
	                			# code...
	                			break;	                		
	                		case self::STATUS_POSITIF:
	                			$notif_type = \app\models\Notification::KEY_CREATE_STATUS_POSITIF;
	                			# code...
	                			break;
	                		case self::STATUS_SEMBUH:
	                			$notif_type = \app\models\Notification::KEY_CREATE_STATUS_SEMBUH;
	                			# code...
	                			break;
	                		case self::STATUS_PERGI:
	                			$notif_type = \app\models\Notification::KEY_CREATE_STATUS_PERGI;
	                			# code...
	                			break;
	                		case self::STATUS_NEGATIF:
	                			$notif_type = \app\models\Notification::KEY_CREATE_STATUS_NEGATIF;
	                			# code...
	                			break;
	                		default:
	                			$notif_type = \app\models\Notification::KEY_CREATE_STATUS_DALAM_PEMANTAUAN;
	                			# code...
	                			break;
	                	}
	                    \app\models\NotificationModel::createNotification($notif_type, $this->id,$userModelData->id);                                    
	                }

	            }
	            /* end notification for user posko */
    			# code...
    			break;    		
			case 'update':
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
	                	switch ($this->status) {
	                		case self::STATUS_DALAM_PEMANTAUAN:
	                			$notif_type = \app\models\Notification::KEY_UPDATE_STATUS_DALAM_PEMANTAUAN;
	                			# code...
	                			break;
	                		case self::STATUS_GEJALA:
	                			$notif_type = \app\models\Notification::KEY_UPDATE_STATUS_GEJALA;
	                			# code...
	                			break;	                		
	                		case self::STATUS_POSITIF:
	                			$notif_type = \app\models\Notification::KEY_UPDATE_STATUS_POSITIF;
	                			# code...
	                			break;
	                		case self::STATUS_SEMBUH:
	                			$notif_type = \app\models\Notification::KEY_UPDATE_STATUS_SEMBUH;
	                			# code...
	                			break;
	                		case self::STATUS_PERGI:
	                			$notif_type = \app\models\Notification::KEY_UPDATE_STATUS_PERGI;
	                			# code...
	                			break;
	                		case self::STATUS_NEGATIF:
	                			$notif_type = \app\models\Notification::KEY_UPDATE_STATUS_NEGATIF;
	                			# code...
	                			break;
	                		default:
	                			$notif_type = \app\models\Notification::KEY_UPDATE_STATUS_DALAM_PEMANTAUAN;
	                			# code...
	                			break;
	                	}
	                    \app\models\NotificationModel::createNotification($notif_type, $this->id,$userModelData->id);                                    
	                }

	            }
	            /* end notification for user posko */
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
	            	$action = "create_data_posko";
	            	$action_id = $this->id;
	            	$data = $this->toArray();
	            	$createLogs = \app\models\LogsModel::CreateLogs($user_id,$action,$action_id,$data);
	            /* end */
    			# code...
    			break;
    		case 'update':
	            /* start  */
	            	$user_id = $this->updated_by;
	            	$action = "update_data_posko";
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