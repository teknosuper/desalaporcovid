<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "negara".
 *
 * @property int $id
 * @property string $kode_negara
 * @property string $nama
 */
class Negara extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'negara';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_negara'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode_negara' => Yii::t('app', 'Kode Negara'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }
}
