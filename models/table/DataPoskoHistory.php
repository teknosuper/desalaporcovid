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
 * @property string|null $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 *
 * @property Users $createdBy
 * @property DataPosko $dataPosko
 * @property Users $updatedBy
 */
class DataPoskoHistory extends \yii\db\ActiveRecord
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
            [['tanggal', 'created_at', 'updated_at'], 'safe'],
            [['keterangan'], 'string'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['data_posko_id'], 'exist', 'skipOnError' => true, 'targetClass' => DataPosko::className(), 'targetAttribute' => ['data_posko_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[DataPosko]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPosko()
    {
        return $this->hasOne(DataPosko::className(), ['id' => 'data_posko_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'updated_by']);
    }
}
