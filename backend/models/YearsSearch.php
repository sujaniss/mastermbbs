<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Years;

/**
 * YearsSearch represents the model behind the search form about `backend\models\Years`.
 */
class YearsSearch extends Years
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year_id', 'cb', 'ub', 'status'], 'integer'],
            [['year_name', 'cod', 'uod', 'field1', 'field'], 'safe'],
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
        $query = Years::find();

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
            'year_id' => $this->year_id,
            'cb' => $this->cb,
            'ub' => $this->ub,
            'cod' => $this->cod,
            'uod' => $this->uod,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'year_name', $this->year_name])
            ->andFilterWhere(['like', 'field1', $this->field1])
            ->andFilterWhere(['like', 'field', $this->field]);

        return $dataProvider;
    }
}
