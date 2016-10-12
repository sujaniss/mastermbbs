<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Subjects;

/**
 * SubjectSearch represents the model behind the search form about `backend\models\Subjects`.
 */
class SubjectSearch extends Subjects {

        /**
         * @inheritdoc
         */
		public $semester;
        public function rules() {
                return [
                    [['sub_id', 'sem_id', 'cb', 'ub', 'status'], 'integer'],
                    [['sub_name', 'cod', 'uod', 'field1', 'field2'], 'safe'],
                ];
        }

        /**
         * @inheritdoc
         */
        public function scenarios() {
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
        public function search($params) {
                $query = Subjects::find();

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
                    'sub_id' => $this->sub_id,
                   // 'sem_id' => $this->sem_id,
                    'cb' => $this->cb,
                    'ub' => $this->ub,
                    'cod' => $this->cod,
                    'uod' => $this->uod,
                    'status' => $this->status,
                ]);

                $query->andFilterWhere(['like', 'sub_name', $this->sub_name]);
               
                if(isset($searchModel->semester) && $searchModel->semester > 0 )
                	$query->andFilterWhere(['=', 'sem_id', $searchModel->semester]);
                        

                return $dataProvider;
        }

}
