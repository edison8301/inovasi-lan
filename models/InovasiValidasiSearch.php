<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InovasiValidasi;

/**
 * InovasiValidasiSearch represents the model behind the search form of `app\models\InovasiValidasi`.
 */
class InovasiValidasiSearch extends InovasiValidasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inovasi_id', 'validasi_id', 'aktif'], 'integer'],
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

    public function getQuerySearch($params)
    {
        $query = InovasiValidasi::find();
        $query->orderBy(['id' => SORT_DESC]);

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'inovasi_id' => $this->inovasi_id,
            'validasi_id' => $this->validasi_id,
            'aktif' => $this->aktif,
        ]);

        return $query;
    }
    
    public function search($params)
    {
        $query = $this->getQuerySearch($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }


}
