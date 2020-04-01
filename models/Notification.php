<?php 
namespace app\models;

use Yii;
use machour\yii2\notifications\models\Notification as BaseNotification;

class Notification extends BaseNotification
{

    const KEY_NEW_MESSAGE = 'new_message';

    const KEY_LAPORAN_KE_POSKO = 'laporan_ke_posko';
    const KEY_UPDATE_LAPORAN_ON_PROCESS = 'laporan_on_process';
    const KEY_UPDATE_LAPORAN_PROCESSED = 'laporan_processed';
    const KEY_UPDATE_LAPORAN_NOT_VALID = 'laporan_not_valid';

    const KEY_CREATE_STATUS_DALAM_PEMANTAUAN = 'KEY_CREATE_STATUS_DALAM_PEMANTAUAN';
    const KEY_CREATE_STATUS_GEJALA = 'KEY_CREATE_STATUS_GEJALA';
    const KEY_CREATE_STATUS_POSITIF = 'KEY_CREATE_STATUS_POSITIF';
    const KEY_CREATE_STATUS_SEMBUH = 'KEY_CREATE_STATUS_SEMBUH';
    const KEY_CREATE_STATUS_PERGI = 'KEY_CREATE_STATUS_PERGI';
    const KEY_CREATE_STATUS_NEGATIF = 'KEY_CREATE_STATUS_NEGATIF';
    
    const KEY_UPDATE_STATUS_DALAM_PEMANTAUAN = 'KEY_UPDATE_STATUS_DALAM_PEMANTAUAN';
    const KEY_UPDATE_STATUS_GEJALA = 'KEY_UPDATE_STATUS_GEJALA';
    const KEY_UPDATE_STATUS_POSITIF = 'KEY_UPDATE_STATUS_POSITIF';
    const KEY_UPDATE_STATUS_SEMBUH = 'KEY_UPDATE_STATUS_SEMBUH';
    const KEY_UPDATE_STATUS_PERGI = 'KEY_UPDATE_STATUS_PERGI';
    const KEY_UPDATE_STATUS_NEGATIF = 'KEY_UPDATE_STATUS_NEGATIF';



    /**
     * @var array Holds all usable notifications
     */
    public static $keys = [
        self::KEY_NEW_MESSAGE,
        self::KEY_LAPORAN_KE_POSKO,
        self::KEY_UPDATE_LAPORAN_ON_PROCESS,
        self::KEY_UPDATE_LAPORAN_PROCESSED,
        self::KEY_UPDATE_LAPORAN_NOT_VALID,

        self::KEY_CREATE_STATUS_DALAM_PEMANTAUAN,
        self::KEY_CREATE_STATUS_GEJALA,
        self::KEY_CREATE_STATUS_POSITIF,
        self::KEY_CREATE_STATUS_SEMBUH,
        self::KEY_CREATE_STATUS_PERGI,
        self::KEY_CREATE_STATUS_NEGATIF,

        self::KEY_UPDATE_STATUS_DALAM_PEMANTAUAN,
        self::KEY_UPDATE_STATUS_GEJALA,
        self::KEY_UPDATE_STATUS_POSITIF,
        self::KEY_UPDATE_STATUS_SEMBUH,
        self::KEY_UPDATE_STATUS_PERGI,
        self::KEY_UPDATE_STATUS_NEGATIF,
    ];

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        switch ($this->key) {
            case self::KEY_NEW_MESSAGE:
                return Yii::t('app', 'You get new message!');

            case self::KEY_LAPORAN_KE_POSKO:
                return Yii::t('app', 'Ada Laporan Baru dari Warga');                      

            case self::KEY_UPDATE_LAPORAN_ON_PROCESS:
                return Yii::t('app', 'Laporan anda masih diproses tim terkait');                    
            case self::KEY_UPDATE_LAPORAN_PROCESSED:
                return Yii::t('app', 'Laporan anda valid dan sudah diproses tim terkait');              
            case self::KEY_UPDATE_LAPORAN_NOT_VALID:
                return Yii::t('app', 'Laporan anda tidak valid, silahkan laporkan lagi data yang benar');          

            case self::KEY_CREATE_STATUS_DALAM_PEMANTAUAN:
                return Yii::t('app', 'Perubahan STATUS Warga DALAM PEMANTAUAN COVID-19');          
            case self::KEY_CREATE_STATUS_GEJALA:
                return Yii::t('app', 'Perubahan STATUS Warga GEJALA COVID-19');          
            case self::KEY_CREATE_STATUS_POSITIF:
                return Yii::t('app', 'Perubahan STATUS Warga POSITIF COVID-19');          
            case self::KEY_CREATE_STATUS_SEMBUH:
                return Yii::t('app', 'Perubahan STATUS Warga SEMBUH dari COVID-19');          
            case self::KEY_CREATE_STATUS_PERGI:
                return Yii::t('app', 'Perubahan STATUS Warga PERGI ke Luar Kota');          
            case self::KEY_CREATE_STATUS_NEGATIF:
                return Yii::t('app', 'Perubahan STATUS Warga NEGATIF COVID-19');                   


            case self::KEY_UPDATE_STATUS_DALAM_PEMANTAUAN:
                return Yii::t('app', 'Perubahan STATUS Warga DALAM PEMANTAUAN COVID-19');          
            case self::KEY_UPDATE_STATUS_GEJALA:
                return Yii::t('app', 'Perubahan STATUS Warga GEJALA COVID-19');          
            case self::KEY_UPDATE_STATUS_POSITIF:
                return Yii::t('app', 'Perubahan STATUS Warga POSITIF COVID-19');          
            case self::KEY_UPDATE_STATUS_SEMBUH:
                return Yii::t('app', 'Perubahan STATUS Warga SEMBUH dari COVID-19');          
            case self::KEY_UPDATE_STATUS_PERGI:
                return Yii::t('app', 'Perubahan STATUS Warga PERGI ke Luar Kota');          
            case self::KEY_UPDATE_STATUS_NEGATIF:
                return Yii::t('app', 'Perubahan STATUS Warga NEGATIF COVID-19');          

        }
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        switch ($this->key) {

            case self::KEY_NEW_MESSAGE:
                // $message = Message::findOne($this->key_id);
                return Yii::t('app', '{customer} sent you a message', [
                    // 'customer' => $meeting->customer->name
                    'customer' => 'teknosuper'
                ]);

            case self::KEY_LAPORAN_KE_POSKO:
                // $meeting = Meeting::findOne($this->key_id);
                // return Yii::t('app', 'You are meeting with {customer}', [
                //     // 'customer' => $meeting->customer->name
                //     'customer' => 'teknosuper'
                // ]);
                return 'Ada Laporan Baru dari Warga';            
            case self::KEY_UPDATE_LAPORAN_ON_PROCESS:
                return 'Laporan anda masih diproses tim terkait';            
            case self::KEY_UPDATE_LAPORAN_PROCESSED:
                return 'Laporan anda valid dan sudah diproses tim terkait';            
            case self::KEY_UPDATE_LAPORAN_NOT_VALID:
                return 'Laporan anda tidak valid, silahkan laporkan lagi data yang benar';

            case self::KEY_CREATE_STATUS_DALAM_PEMANTAUAN:
                return Yii::t('app', 'Perubahan STATUS Warga DALAM PEMANTAUAN COVID-19');          
            case self::KEY_CREATE_STATUS_GEJALA:
                return Yii::t('app', 'Perubahan STATUS Warga GEJALA COVID-19');          
            case self::KEY_CREATE_STATUS_POSITIF:
                return Yii::t('app', 'Perubahan STATUS Warga POSITIF COVID-19');          
            case self::KEY_CREATE_STATUS_SEMBUH:
                return Yii::t('app', 'Perubahan STATUS Warga SEMBUH dari COVID-19');          
            case self::KEY_CREATE_STATUS_PERGI:
                return Yii::t('app', 'Perubahan STATUS Warga PERGI ke Luar Kota');          
            case self::KEY_CREATE_STATUS_NEGATIF:
                return Yii::t('app', 'Perubahan STATUS Warga NEGATIF COVID-19');                   


            case self::KEY_UPDATE_STATUS_DALAM_PEMANTAUAN:
                return Yii::t('app', 'Perubahan STATUS Warga DALAM PEMANTAUAN COVID-19');          
            case self::KEY_UPDATE_STATUS_GEJALA:
                return Yii::t('app', 'Perubahan STATUS Warga GEJALA COVID-19');          
            case self::KEY_UPDATE_STATUS_POSITIF:
                return Yii::t('app', 'Perubahan STATUS Warga POSITIF COVID-19');          
            case self::KEY_UPDATE_STATUS_SEMBUH:
                return Yii::t('app', 'Perubahan STATUS Warga SEMBUH dari COVID-19');          
            case self::KEY_UPDATE_STATUS_PERGI:
                return Yii::t('app', 'Perubahan STATUS Warga PERGI ke Luar Kota');          
            case self::KEY_UPDATE_STATUS_NEGATIF:
                return Yii::t('app', 'Perubahan STATUS Warga NEGATIF COVID-19'); 

        }
    }

    /**
     * @inheritdoc
     */
    public function getRoute()
    {
        switch ($this->key) {
            case self::KEY_NEW_MESSAGE:
                return ['meeting', 'id' => $this->key_id];

            case self::KEY_LAPORAN_KE_POSKO:
            case self::KEY_UPDATE_LAPORAN_ON_PROCESS:
            case self::KEY_UPDATE_LAPORAN_PROCESSED:
            case self::KEY_UPDATE_LAPORAN_NOT_VALID:
                return ['/laporan/view', 'id' => $this->key_id]; 

            case self::KEY_CREATE_STATUS_DALAM_PEMANTAUAN:
            case self::KEY_CREATE_STATUS_GEJALA:
            case self::KEY_CREATE_STATUS_POSITIF:
            case self::KEY_CREATE_STATUS_SEMBUH:
            case self::KEY_CREATE_STATUS_PERGI:
            case self::KEY_CREATE_STATUS_NEGATIF:
            case self::KEY_UPDATE_STATUS_DALAM_PEMANTAUAN:
            case self::KEY_UPDATE_STATUS_GEJALA:
            case self::KEY_UPDATE_STATUS_POSITIF:
            case self::KEY_UPDATE_STATUS_SEMBUH:
            case self::KEY_UPDATE_STATUS_PERGI:
            case self::KEY_UPDATE_STATUS_NEGATIF:
                return ['/dataposko/view', 'id' => $this->key_id]; 
        };
    }

}
?>