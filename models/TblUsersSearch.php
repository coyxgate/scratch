<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblUsers;

/**
 * TblUsersSearch represents the model behind the search form about `app\models\TblUsers`.
 */
class TblUsersSearch extends TblUsers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mobile', 'is_deleted'], 'integer'],
            [['name', 'openid', 'address', 'header_img', 'note', 'gender', 'create_at'], 'safe'],
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
        $query = TblUsers::find();

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
            'mobile' => $this->mobile,
            'is_deleted' => $this->is_deleted,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'header_img', $this->header_img])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'gender', $this->gender]);

        return $dataProvider;
    }
}
