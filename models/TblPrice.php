<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_price}}".
 *
 * @property integer $id
 * @property string $campaign_id
 * @property string $name
 * @property integer $num
 * @property string $pic
 * @property integer $odds
 * @property integer $nth
 * @property integer $is_deleted
 * @property string $create_at
 */
class TblPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_price}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num', 'odds', 'nth', 'is_deleted'], 'integer'],
            [['create_at'], 'safe'],
            [['campaign_id', 'name'], 'string', 'max' => 20],
            [['pic'], 'string', 'max' => 128],
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
            'name' => '奖项名',
            'num' => 'Num',
            'pic' => 'Pic',
            'odds' => 'Odds',
            'nth' => 'Nth',
            'is_deleted' => 'Is Deleted',
            'create_at' => 'Create At',
        ];
    }
}
