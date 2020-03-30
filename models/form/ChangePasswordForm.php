<?php

namespace app\models\form;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ChangePasswordForm extends Model
{
    public $new_password;
    public $confirm_password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['new_password','confirm_password'], 'required'],
            ['confirm_password','compare','compareAttribute'=>'new_password'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'new_password' => Yii::t('app', 'Password Baru'),
            'confirm_password' => Yii::t('app', 'Konfirmasi Password Baru'),
        ];
    }

    /**
     * @return array customized attribute labels
     */

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */

}
