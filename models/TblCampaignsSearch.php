<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblCampaigns;

/**
 * TblCampaignsSearch represents the model behind the search form about `app\models\TblCampaigns`.
 */
class TblCampaignsSearch extends TblCampaigns
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_random', 'total_limit_num', 'each_limit_num', 'is_launched', 'is_deleted'], 'integer'],
            [['keyword', 'name', 'contact_us_info', 'description', 'start_at', 'end_at', 'hints', 'duplicate_reply', 'end_title', 'end_description', 'create_at'], 'safe'],
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
        $query = TblCampaigns::find();

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
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'is_random' => $this->is_random,
            'total_limit_num' => $this->total_limit_num,
            'each_limit_num' => $this->each_limit_num,
            'is_launched' => $this->is_launched,
            'is_deleted' => $this->is_deleted,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contact_us_info', $this->contact_us_info])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'hints', $this->hints])
            ->andFilterWhere(['like', 'duplicate_reply', $this->duplicate_reply])
            ->andFilterWhere(['like', 'end_title', $this->end_title])
            ->andFilterWhere(['like', 'end_description', $this->end_description]);

        return $dataProvider;
    }
}
