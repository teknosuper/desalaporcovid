<?php 
namespace app\models;

use Yii;
use machour\yii2\notifications\models\Notification as BaseNotification;

class Notification extends BaseNotification
{

    const KEY_NEW_MESSAGE = 'new_message';

    const KEY_RELOAD_SIMCARD = 'reload_simcard';

    const KEY_REGISTER_SIMCARD = 'register_simcard';

    const KEY_REGISTER_BP = 'register_bp';

    const KEY_BUY_PIN = 'buy_pin';

    const KEY_GET_UNILEVEL_DOWNLINE = 'get_unilevel_downline';

    const KEY_GET_BINARY_DOWNLINE = 'get_binary_downline';

    const KEY_GET_FORCE_MATRIX_DOWNLINE = 'get_force_matrix_downline';

    const KEY_BUY_QOIN = 'get_buy_qoin';

    const KEY_WAITING_FOR_PAYMENT = 'get_waiting_for_payment';

    const KEY_PAYMENT_FAILED = 'get_payment_failed';

    const KEY_PAYMENT_PAID = 'get_payment_paid';

    const KEY_ORDER_COMPLETED = 'get_order_completed';

    const KEY_USER_REGISTERED_SIMCARD = 'user_registered_simcard';

    const KEY_USER_REGISTERED_BINARY = 'user_registered_binary';

    const KEY_USER_REGISTERED_FORCE_MATRIX = 'user_registered_force_matrix';



    /**
     * @var array Holds all usable notifications
     */
    public static $keys = [
        self::KEY_NEW_MESSAGE,
        self::KEY_RELOAD_SIMCARD,
        self::KEY_REGISTER_SIMCARD,
        self::KEY_REGISTER_BP,
        self::KEY_BUY_PIN,
        self::KEY_GET_UNILEVEL_DOWNLINE,
        self::KEY_GET_BINARY_DOWNLINE,
        self::KEY_GET_FORCE_MATRIX_DOWNLINE,
        self::KEY_BUY_QOIN,
        self::KEY_WAITING_FOR_PAYMENT,
        self::KEY_PAYMENT_FAILED,
        self::KEY_PAYMENT_PAID,
        self::KEY_ORDER_COMPLETED,
        self::KEY_USER_REGISTERED_SIMCARD,
        self::KEY_USER_REGISTERED_BINARY,
        self::KEY_USER_REGISTERED_FORCE_MATRIX,
    ];

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        switch ($this->key) {
            case self::KEY_NEW_MESSAGE:
                return Yii::t('app', 'You get new message!');

            case self::KEY_RELOAD_SIMCARD:
                return Yii::t('app', 'Reload Simcard Notification');

            case self::KEY_REGISTER_SIMCARD:
                return Yii::t('app', 'Register Simcard Notification');   

            case self::KEY_REGISTER_BP:
                return Yii::t('app', 'Register Brand Partner Notification');

            case self::KEY_BUY_PIN:
                return Yii::t('app', 'Buy Pin Notification');  

            case self::KEY_GET_UNILEVEL_DOWNLINE:
                return Yii::t('app', 'Unilevel Downline Notification'); 

            case self::KEY_GET_BINARY_DOWNLINE:
                return Yii::t('app', 'Binary Downline Notification'); 

            case self::KEY_GET_FORCE_MATRIX_DOWNLINE:
                return Yii::t('app', 'Force Matrix Downline Notification');            
            case self::KEY_BUY_QOIN:
                return Yii::t('app', 'Force Matrix Downline Notification');            
            case self::KEY_WAITING_FOR_PAYMENT:
                $model = PurchaseModel::find()->where(['purchase_id'=>$this->key_id])->one();
                $currency = $model->purchase_currency;
                $amount = $model->purchase_total_after;
                $payment_type = ($model->purchaseBelongsToPaymentType) ? $model->purchaseBelongsToPaymentType->payment_type_name : null;
                return Yii::t('app', 'Waiting Payment for {currency} {amount} using {payment_type}',[
                    'currency'=>$currency,
                    'amount'=>$amount,
                    'payment_type'=>$payment_type,
                ]);
            case self::KEY_PAYMENT_FAILED:
                $model = PurchaseModel::find()->where(['purchase_id'=>$this->key_id])->one();
                $currency = $model->purchase_currency;
                $amount = $model->purchase_total_after;
                $payment_type = ($model->purchaseBelongsToPaymentType) ? $model->purchaseBelongsToPaymentType->payment_type_name : null;
                return Yii::t('app', 'Payment Failed for {currency} {amount} using {payment_type}',[
                    'currency'=>$currency,
                    'amount'=>$amount,
                    'payment_type'=>$payment_type,
                ]);
            case self::KEY_PAYMENT_PAID:
                $model = PurchaseModel::find()->where(['purchase_id'=>$this->key_id])->one();
                $currency = $model->purchase_currency;
                $amount = $model->purchase_total_after;
                $payment_type = ($model->purchaseBelongsToPaymentType) ? $model->purchaseBelongsToPaymentType->payment_type_name : null;
                return Yii::t('app', 'Payment paid for {currency} {amount} using {payment_type}',[
                    'currency'=>$currency,
                    'amount'=>$amount,
                    'payment_type'=>$payment_type,
                ]);
            case self::KEY_ORDER_COMPLETED:
                return Yii::t('app', 'Order Completed');            
            case self::KEY_USER_REGISTERED_SIMCARD:
                return Yii::t('app', 'You have Successfully registered as Regular User');            
            case self::KEY_USER_REGISTERED_BINARY:
                return Yii::t('app', 'You have Successfully registered as Binary');            
            case self::KEY_USER_REGISTERED_FORCE_MATRIX:
                return Yii::t('app', 'You have Successfully registered as Force Matrix user');            

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

            case self::KEY_RELOAD_SIMCARD:
                // $meeting = Meeting::findOne($this->key_id);
                // return Yii::t('app', 'You are meeting with {customer}', [
                //     // 'customer' => $meeting->customer->name
                //     'customer' => 'teknosuper'
                // ]);
                return 'Successfully Reload Simcard';
            case self::KEY_REGISTER_SIMCARD:
                // We don't have a key_id here, simple message
                return 'Successfully registering simcard as Regular User';

            case self::KEY_REGISTER_BP:
                // We don't have a key_id here, simple message
                return 'Successfully registering Brand Partner';

            case self::KEY_BUY_PIN:
                // We don't have a key_id here, simple message
                return 'Buy Pin';            
            case self::KEY_GET_UNILEVEL_DOWNLINE:
                // We don't have a key_id here, simple message
                return 'Get Unilevel Downline';            
            case self::KEY_GET_BINARY_DOWNLINE:
                // We don't have a key_id here, simple message
                return 'Get Binary Downline';            
            case self::KEY_GET_FORCE_MATRIX_DOWNLINE:
                // We don't have a key_id here, simple message
                return 'Get force matrix downline';            
            case self::KEY_BUY_QOIN:
                // We don't have a key_id here, simple message
                return 'Buy Qoin';            
            case self::KEY_WAITING_FOR_PAYMENT:
                // We don't have a key_id here, simple message
                return 'Waiting for payment';            
            case self::KEY_PAYMENT_FAILED:
                // We don't have a key_id here, simple message
                return 'Payment Failed';            
            case self::KEY_PAYMENT_PAID:
                // We don't have a key_id here, simple message
                return 'Payment Paid';            
            case self::KEY_ORDER_COMPLETED:
                // We don't have a key_id here, simple message
                return 'Order Completed';            
            case self::KEY_USER_REGISTERED_SIMCARD:
                // We don't have a key_id here, simple message
                return 'Successfully Registered simcard as regular user';            
            case self::KEY_USER_REGISTERED_BINARY:
                // We don't have a key_id here, simple message
                return 'Successfully Registered as binary';            
            case self::KEY_USER_REGISTERED_FORCE_MATRIX:
                // We don't have a key_id here, simple message
                return 'Successfully Registered as force matrix';
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

            case self::KEY_RELOAD_SIMCARD:
                return ['/profile/transaction/view', 'id' => $this->key_id]; 

            case self::KEY_REGISTER_SIMCARD:
                return ['/register/history', 'id' => $this->key_id];

            case self::KEY_REGISTER_BP:
                return ['register/history', 'id' => $this->key_id];

            case self::KEY_BUY_PIN:
                return ['message/read', 'id' => $this->key_id];            
            case self::KEY_GET_UNILEVEL_DOWNLINE:
                return ['register/history', 'id' => $this->key_id];            
            case self::KEY_GET_BINARY_DOWNLINE:
                return ['register/history', 'id' => $this->key_id];            
            case self::KEY_GET_FORCE_MATRIX_DOWNLINE:
                return ['register/history', 'id' => $this->key_id];            
            case self::KEY_BUY_QOIN:
                return ['message/read', 'id' => $this->key_id];            
            case self::KEY_WAITING_FOR_PAYMENT:
                return ['/profile/transaction/view', 'id' => $this->key_id];            
            case self::KEY_PAYMENT_FAILED:
                return ['/profile/transaction/view', 'id' => $this->key_id];            
            case self::KEY_PAYMENT_PAID:
                return ['/profile/transaction/view', 'id' => $this->key_id];            
            case self::KEY_ORDER_COMPLETED:
                return ['/profile/transaction/view', 'id' => $this->key_id];            
            case self::KEY_USER_REGISTERED_SIMCARD:
                return ['/profile/index'];            
            case self::KEY_USER_REGISTERED_BINARY:
                return ['/profile/index'];            
            case self::KEY_USER_REGISTERED_FORCE_MATRIX:
                return ['/profile/index'];
        };
    }

}
?>