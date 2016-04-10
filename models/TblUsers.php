<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_users}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $openid
 * @property integer $mobile
 * @property string $address
 * @property string $header_img
 * @property string $note
 * @property string $gender
 * @property integer $is_deleted
 * @property string $create_at
 */
class TblUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'is_deleted'], 'integer'],
            [['create_at'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['openid'], 'string', 'max' => 50],
            [['address', 'note'], 'string', 'max' => 256],
            [['header_img', 'gender'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'openid' => 'Openid',
            'mobile' => 'Mobile',
            'address' => 'Address',
            'header_img' => 'Header Img',
            'note' => 'Note',
            'gender' => 'Gender',
            'is_deleted' => 'Is Deleted',
            'create_at' => 'Create At',
        ];
    }
}
