<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241219
 * 中国地图表搜索php
 */

namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ChinaMap;

/**
 * ChinaMapSearch represents the model behind the search form of `common\models\ChinaMap`.
 */
class ChinaMapSearch extends ChinaMap
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['province'], 'safe'],
            [['competitiveness_index'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ChinaMap::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'competitiveness_index' => $this->competitiveness_index,
        ]);

        $query->andFilterWhere(['like', 'province', $this->province]);

        return $dataProvider;
    }
}
