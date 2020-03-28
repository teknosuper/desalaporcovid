<?php

namespace app\models\form;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PoskoModel;

/**
 * PoskoSearch represents the model behind the search form of `\app\models\PoskoModel`.
 */
class PoskoSearch extends PoskoModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_kelurahan', 'status'], 'integer'],
            [['nama_posko', 'alamat_posko', 'email_posko', 'keterangan'], 'safe'],
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
        $query = PoskoModel::find();

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
            'id_kelurahan' => $this->id_kelurahan,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nama_posko', $this->nama_posko])
            ->andFilterWhere(['like', 'alamat_posko', $this->alamat_posko])
            ->andFilterWhere(['like', 'email_posko', $this->email_posko])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
