<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `backend\models\Question`.
 */
class QuestionSearch extends Question {

        /**
         * @inheritdoc
         */
        public $searchparams;

        public function rules() {
                return [
                    [['question_id', 'correct_ans_id', 'cb', 'ub', 'status', 'test_id'], 'integer'],
                    [['question', 'solutions', 'cod', 'uod'], 'safe'],
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
                $query = Question::find();

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
                    'question_id' => $this->question_id,
                    'correct_ans_id' => $this->correct_ans_id,
                    'cb' => $this->cb,
                    'ub' => $this->ub,
                    'cod' => $this->cod,
                    'uod' => $this->uod,
                    'status' => $this->status,
                ]);

                if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $query->andFilterWhere(['test_id' => $_GET['id']]);
                }

                $query->andFilterWhere(['like', 'question', $this->question])
                        ->andFilterWhere(['like', 'solutions', $this->solutions]);

                return $dataProvider;
        }

}
