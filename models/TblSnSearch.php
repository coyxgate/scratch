<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblSn;

/**
 * TblSnSearch represents the model behind the search form about `app\models\TblSn`.
 */
class TblSnSearch extends TblSn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_redeem', 'is_deleted'], 'integer'],
            [['code', 'price_id', 'user_id', 'redeem_time', 'redeem_note', 'create_at'], 'safe'],
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
        $query = TblSn::find();

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
            'is_redeem' => $this->is_redeem,
            'redeem_time' => $this->redeem_time,
            'is_deleted' => $this->is_deleted,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'price_id', $this->price_id])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'redeem_note', $this->redeem_note]);

        return $dataProvider;
    }
}
