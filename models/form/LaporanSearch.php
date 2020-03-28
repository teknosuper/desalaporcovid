<?php

namespace app\models\form;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LaporanModel;

/**
 * LaporanSearch represents the model behind the search form of `\app\models\LaporanModel`.
 */
class LaporanSearch extends LaporanModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kelurahan', 'jenis_laporan', 'kota_asal', 'kelurahan_datang', 'status', 'id_pelapor', 'id_posko'], 'integer'],
            [['nama_warga', 'alamat', 'no_telepon_pelapor', 'no_telepon_terlapor', 'keterangan'], 'safe'],
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
        $query = LaporanModel::find();

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
            'kelurahan' => $this->kelurahan,
            'jenis_laporan' => $this->jenis_laporan,
            'kota_asal' => $this->kota_asal,
            'kelurahan_datang' => $this->kelurahan_datang,
            'status' => $this->status,
            'id_pelapor' => $this->id_pelapor,
            'id_posko' => $this->id_posko,
        ]);

        $query->andFilterWhere(['like', 'nama_warga', $this->nama_warga])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telepon_pelapor', $this->no_telepon_pelapor])
            ->andFilterWhere(['like', 'no_telepon_terlapor', $this->no_telepon_terlapor])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
