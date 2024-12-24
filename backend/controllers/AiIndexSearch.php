<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241222
 * AIindex表搜索php
 */


namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AiIndex;

/**
 * AiIndexSearch represents the model behind the search form of `common\models\AiIndex`.
 */
class AiIndexSearch extends AiIndex
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Country', 'Region', 'Cluster', 'Income_group', 'Political_regime'], 'safe'],
            [['Talent', 'Infrastructure', 'Operating_Environment', 'Research', 'Development', 'Government_Strategy', 'Commercial', 'Total_score'], 'number'],
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
        $query = AiIndex::find();

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
            'Talent' => $this->Talent,
            'Infrastructure' => $this->Infrastructure,
            'Operating_Environment' => $this->Operating_Environment,
            'Research' => $this->Research,
            'Development' => $this->Development,
            'Government_Strategy' => $this->Government_Strategy,
            'Commercial' => $this->Commercial,
            'Total_score' => $this->Total_score,
        ]);

        $query->andFilterWhere(['like', 'Country', $this->Country])
            ->andFilterWhere(['like', 'Region', $this->Region])
            ->andFilterWhere(['like', 'Cluster', $this->Cluster])
            ->andFilterWhere(['like', 'Income_group', $this->Income_group])
            ->andFilterWhere(['like', 'Political_regime', $this->Political_regime]);

        return $dataProvider;
    }
}
