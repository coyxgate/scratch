<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPrice;

/**
 * TblPriceSearch represents the model behind the search form about `app\models\TblPrice`.
 */
class TblPriceSearch extends TblPrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'num', 'odds', 'nth', 'is_deleted'], 'integer'],
            [['campaign_id', 'name', 'pic', 'create_at'], 'safe'],
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
        $query = TblPrice::find();

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
            'num' => $this->num,
            'odds' => $this->odds,
            'nth' => $this->nth,
            'is_deleted' => $this->is_deleted,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'campaign_id', $this->campaign_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'pic', $this->pic]);

        return $dataProvider;
    }
}
