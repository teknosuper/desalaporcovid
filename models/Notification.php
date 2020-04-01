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



    /**
     * @var array Holds all usable notifications
     */
    public static $keys = [
        self::KEY_NEW_MESSAGE,
        self::KEY_LAPORAN_KE_POSKO,
        self::KEY_UPDATE_LAPORAN_ON_PROCESS,
        self::KEY_UPDATE_LAPORAN_PROCESSED,
        self::KEY_UPDATE_LAPORAN_NOT_VALID,
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
        };
    }

}
?>