<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Semesters;

/**
 * SemestersSearch represents the model behind the search form about `backend\models\Semesters`.
 */
class SemestersSearch extends Semesters
{
    /**
     * @inheritdoc
     */
	public $year;
    public function rules()
    {
        return [
            [['sem_id', 'year_id', 'status', 'cb', 'ub'], 'integer'],
            [['sem_name', 'cod', 'uod'], 'safe'],
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
        $query = Semesters::find();

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
            'sem_id' => $this->sem_id,
            //'year_id' => $this->year_id,
            'status' => $this->status,
            'cb' => $this->cb,
            'ub' => $this->ub,
            'cod' => $this->cod,
            'uod' => $this->uod,
        ]);

        $query->andFilterWhere(['like', 'sem_name', $this->sem_name]);
        
        if(isset($searchModel->year) && $searchModel->year > 0 )
        	$query->andFilterWhere(['=', 'year_id', $searchModel->year]);

        return $dataProvider;
    }
}
