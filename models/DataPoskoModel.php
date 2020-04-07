<?php

namespace app\models;

use Yii;
use app\models\table\DataPosko;

class DataPoskoModel extends DataPosko
{


    // const STATUS_DELETED = 20;
    const STATUS_DALAM_PEMANTAUAN = 10;
    const STATUS_GEJALA = 20;
    const STATUS_POSITIF = 30;
    const STATUS_SEMBUH = 40;
    const STATUS_PERGI = 50;
    const STATUS_NEGATIF = 60;

    const GENDER_L = 'L';
    const GENDER_P = 'P';

    public function getUpdatedByText()
    {
    	if($this->updatedByBelongsToUser)
    	{
	    	return implode(' - ', [$this->updatedByBelongsToUser->nama,$this->updatedByBelongsToUser->username]);
    	}
    	return null;
    }

    public function getCreatedByText()
    {
    	if($this->createdByBelongsToUser)
    	{
	    	return implode(' - ', [$this->createdByBelongsToUser->nama,$this->createdByBelongsToUser->username]);
    	}
    	return null;
    }

    public function getKelurahanText()
    {
		return ($this->kelurahanBelongsToKelurahanModel) ? implode(' - ', [$this->kelurahanBelongsToKelurahanModel->nama,$this->kelurahanBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama,$this->kelurahanBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->kecamatanBelongsToKabupatenModel->nama]) : null;    	
    }

    public function getPoskoText()
    {
		return ($this->poskoBelongsToPoskoModel) ? implode(' - ', [$this->poskoBelongsToPoskoModel->nama_posko,$this->poskoBelongsToPoskoModel->poskoBelongsToKelurahanModel->nama,$this->poskoBelongsToPoskoModel->poskoBelongsToKelurahanModel->kelurahanBelongsToKecamatanModel->nama]) : null;  	
    }

    public function getLuarNegeriText()
    {
    	switch ($this->luar_negeri) {
    		case 1:
    			return "TIDAK";
    			# code...
    			break;
    		case 2:
    			return "IYA";
    			# code...
    			break;    		
    		default:
    			# code...
    			break;
    	}
    }


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

	public function getNegaraBelongsToNegaraModel()
	{
		return $this->hasOne(NegaraModel::className(),['id'=>'id_negara']);
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

	public function getDataPoskoHasManyDataPoskoHistoryModel()
	{
		return $this->hasMany(DataPoskoHistoryModel::className(),['data_posko_id'=>'id']);
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

	public function getTanggalBerakhirIsolasiMandiri()
	{
		return date('d F Y H:i:s',strtotime($this->waktu_datang."+14 days"));
	}

    public function getStatusDetail()
    {
        $status = $this->status;
        $array = self::getStatusList();
        if(isset($array[$status]))
        {
        	$status = $array[$status];
        	$tanggal_berakhir_isolasi = $this->tanggalBerakhirIsolasiMandiri;
        	switch ($this->status) {
        		case self::STATUS_DALAM_PEMANTAUAN:
        			return "
        			<span class='btn btn-xs btn-warning'>{$status}</span>
        			<p><i class='fa fa-warning'></i> Harus isolasi di rumah sampai tanggal : <span class='btn btn-xs btn-danger'>{$tanggal_berakhir_isolasi}</span></p>
        			";
        			# code...
        			break;
        		case self::STATUS_GEJALA:
        			return "
        			<span class='btn btn-xs btn-danger'>{$status}</span>
        			<p><i class='fa fa-warning'></i> Harus isolasi di rumah sampai tanggal : <span class='btn btn-xs btn-danger'>{$tanggal_berakhir_isolasi}</span></p>
        			";
        			# code...
        			break;        		
        		case self::STATUS_GEJALA:
        			return "
        			<span class='btn btn-xs btn-danger'>{$status}</span>
        			<p><i class='fa fa-warning'></i> Harus isolasi di rumah sampai tanggal : <span class='btn btn-xs btn-danger'>{$tanggal_berakhir_isolasi}</span></p>
        			";
        			# code...
        			break;        		
        		default:
        			return "<span class='bg-white'>{$status}</span>";
        			# code...
        			break;
        	}
        }

    }

    public static function getStatusList()
    {
        return [
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
            'nama_warga' => Yii::t('app', 'Nama Warga (Sesuai Identitas)'),
            'kelurahan' => Yii::t('app', 'Kelurahan (Sesuai Identitas)'),
            'alamat' => Yii::t('app', 'Alamat (Sesuai Identitas)'),
            'no_telepon' => Yii::t('app', 'No Telepon'),
            'jenis_laporan' => Yii::t('app', 'Jenis Laporan'),
            'kota_asal' => Yii::t('app', 'Kota Asal (Kota Terakhir Sebelumnya)'),
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
            'gender' => Yii::t('app', 'Jenis Kelamin'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
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
	            $userTypeArray = [
	            	\app\models\User::LEVEL_POSKO,
	            	\app\models\User::LEVEL_ADMIN_DESA,
	            ];
	            $userModel = \app\models\User::find()->where(['user_id'=>$posko_id,'userType'=>$userTypeArray])->all();
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
    		case 'delete':
	            /* start  */
	            	$user_id = \yii::$app->user->identity->id;
	            	$action = "delete_data_posko";
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