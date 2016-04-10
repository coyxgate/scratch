<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_sn}}".
 *
 * @property integer $id
 * @property string $code
 * @property integer $is_redeem
 * @property string $price_id
 * @property string $user_id
 * @property string $redeem_time
 * @property string $redeem_note
 * @property integer $is_deleted
 * @property string $create_at
 */
class TblSn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_sn}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_redeem', 'is_deleted'], 'integer'],
            [['redeem_time', 'create_at'], 'safe'],
            [['code', 'price_id', 'user_id'], 'string', 'max' => 20],
            [['redeem_note'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'is_redeem' => 'Is Redeem',
            'price_id' => 'Price ID',
            'user_id' => 'User ID',
            'redeem_time' => 'Redeem Time',
            'redeem_note' => 'Redeem Note',
            'is_deleted' => 'Is Deleted',
            'create_at' => 'Create At',
        ];
    }
}
