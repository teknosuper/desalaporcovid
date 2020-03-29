<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "data_posko_history".
 *
 * @property int $id
 * @property int|null $data_posko_id
 * @property string|null $tanggal
 * @property string|null $keterangan
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class DataPoskoHistoryTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_posko_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_posko_id', 'created_by', 'updated_by'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'data_posko_id' => Yii::t('app', 'Data Posko ID'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
