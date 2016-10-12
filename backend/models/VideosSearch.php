<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Videos;

/**
 * VideosSearch represents the model behind the search form about `backend\models\Videos`.
 */
class VideosSearch extends Videos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_id', 'topic_id', 'show_order', 'cb', 'ub'], 'integer'],
            [['video_name', 'cod', 'uod', 'field1', 'field2'], 'safe'],
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
        $query = Videos::find();

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
            'video_id' => $this->video_id,
            'topic_id' => $this->topic_id,
            'show_order' => $this->show_order,
            'cb' => $this->cb,
            'ub' => $this->ub,
            'cod' => $this->cod,
            'uod' => $this->uod,
        ]);

        $query->andFilterWhere(['like', 'video_name', $this->video_name])
            ->andFilterWhere(['like', 'field1', $this->field1])
            ->andFilterWhere(['like', 'field2', $this->field2]);

        return $dataProvider;
    }
}
