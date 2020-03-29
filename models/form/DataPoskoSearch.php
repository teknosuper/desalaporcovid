<?php

namespace app\models\form;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataPoskoModel;

/**
 * DataPoskoSearch represents the model behind the search form of `\app\models\DataPoskoModel`.
 */
class DataPoskoSearch extends DataPoskoModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jenis_laporan', 'status', 'id_posko', 'luar_negeri'], 'integer'],
            [['nik', 'nama_warga', 'kelurahan', 'alamat', 'no_telepon', 'kota_asal', 'kelurahan_datang', 'keterangan', 'id_negara'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DataPoskoModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jenis_laporan' => $this->jenis_laporan,
            'status' => $this->status,
            'id_posko' => $this->id_posko,
            'luar_negeri' => $this->luar_negeri,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama_warga', $this->nama_warga])
            ->andFilterWhere(['like', 'kelurahan', $this->kelurahan])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'kota_asal', $this->kota_asal])
            ->andFilterWhere(['like', 'kelurahan_datang', $this->kelurahan_datang])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'id_negara', $this->id_negara]);

        return $dataProvider;
    }
}
