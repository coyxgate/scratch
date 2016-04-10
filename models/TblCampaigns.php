<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_campaigns}}".
 *
 * @property integer $id
 * @property string $keyword
 * @property string $name
 * @property string $contact_us_info
 * @property string $description
 * @property string $start_at
 * @property string $end_at
 * @property string $hints
 * @property string $duplicate_reply
 * @property string $end_title
 * @property string $end_description
 * @property integer $is_random
 * @property integer $total_limit_num
 * @property integer $each_limit_num
 * @property integer $is_launched
 * @property integer $is_deleted
 * @property string $create_at
 */
class TblCampaigns extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_campaigns}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['keyword', 'required', 'message' => '请填写合适的关键词,关键词不能为空'],
            ['name', 'required', 'message' => '活动名称不能为空'],
            ['contact_us_info', 'required', 'message' => '兑奖信息不能为空'],
            ['duplicate_reply', 'required', 'message' => '请务必填写重复抽奖回复'],
            ['end_title', 'required', 'message' => '需要填写活动结束公告主题以告知用户该活动已结束'],
            [['start_at', 'end_at', 'create_at'], 'safe'],
            [['is_random', 'total_limit_num', 'each_limit_num', 'is_launched', 'is_deleted'], 'integer'],
            [['keyword', 'name', 'end_title'], 'string', 'max' => 20],
            [['contact_us_info', 'hints', 'duplicate_reply', 'end_description'], 'string', 'max' => 256],
            [['description'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keyword' => '关键词',
            'name' => '活动名称',
            'contact_us_info' => '兑奖信息',
            'description' => '简介',
            'start_at' => '活动开始时间',
            'end_at' => '活动结束时间',
            'hints' => '活动说明',
            'duplicate_reply' => '重复抽奖回复',
            'end_title' => '活动结束公告主题',
            'end_description' => '活动结束说明',
            'is_random' => '奖项是否随机',
            'total_limit_num' => '每人允许抽奖总次数',
            'each_limit_num' => '每人每天抽奖次数',
            'is_launched' => '状态',
            'is_deleted' => '是否已经删除',
            'create_at' => '创建时间',
        ];
    }

    public function getPrices()
    {
        return $this->hasMany(TblPrice::className(), ['campaign_id' => 'id']);
    }
}
