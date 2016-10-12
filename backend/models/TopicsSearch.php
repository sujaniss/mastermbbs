<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Topics;

/**
 * TopicsSearch represents the model behind the search form about `backend\models\Topics`.
 */
class TopicsSearch extends Topics {

        /**
         * @inheritdoc
         */
	 public $topicsub;
        public function rules() {
                return [
                    [['topic_id', 'parent_id', 'sub_id', 'status', 'cb', 'ub'], 'integer'],
                    [['topic', 'cod', 'uod', 'sem_id', 'chapter_id'], 'safe'],
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
                $query = Topics::find();

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
                    'topic_id' => $this->topic_id,
                    'parent_id' => $this->parent_id,
                    'sub_id' => $this->sub_id,
                    'status' => $this->status,
                    'cb' => $this->cb,
                    'ub' => $this->ub,
                    'cod' => $this->cod,
                    'uod' => $this->uod,
                    'sem_id' => $this->sem_id,
                    'chapter_id' => $this->chapter_id,
                ]);

                $query->andFilterWhere(['like', 'topic', $this->topic]);
                if(isset($searchModel->subect) && $searchModel->subect > 0 )
                	$query->andFilterWhere(['=', 'topicsub', $searchModel->topicsub]);


                return $dataProvider;
        }

}
