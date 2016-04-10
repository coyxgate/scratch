<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_campaign_price_rel}}".
 *
 * @property integer $id
 * @property string $campaign_id
 * @property string $price_id
 * @property integer $is_deleted
 * @property string $create_at
 */
class TblCampaignPriceRel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_campaign_price_rel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_deleted'], 'integer'],
            [['create_at'], 'safe'],
            [['campaign_id', 'price_id'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'campaign_id' => 'Campaign ID',
            'price_id' => 'Price ID',
            'is_deleted' => 'Is Deleted',
            'create_at' => 'Create At',
        ];
    }
}
