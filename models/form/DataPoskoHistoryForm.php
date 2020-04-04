<?php

namespace app\models\form;

use Yii;
use app\models\DataPoskoHistoryModel;

class DataPoskoHistoryForm extends DataPoskoHistoryModel
{

    public function rules()
    {
        return [
            [['data_posko_id', 'created_by', 'updated_by'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
            [['tanggal','keterangan'],'required'],
        ];
    }

}