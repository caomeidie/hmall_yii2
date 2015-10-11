<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%store}}".
 *
 * @property string $store_id
 * @property string $store_name
 * @property string $store_pass
 * @property integer $store_name_auth
 * @property integer $grade_id
 * @property string $store_owner_name
 * @property string $store_owner_card
 * @property integer $area_id
 * @property string $area_info
 * @property string $store_address
 * @property string $store_zip
 * @property string $store_mobile
 * @property integer $store_state
 * @property string $store_close_info
 * @property integer $store_sort
 * @property string $store_time
 * @property string $store_end_time
 * @property string $store_logo
 * @property string $store_workingtime
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%store}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_name_auth', 'grade_id', 'area_id', 'store_state', 'store_sort'], 'integer'],
            [['grade_id', 'store_address', 'store_zip', 'store_mobile', 'store_time'], 'required'],
            [['store_name', 'store_owner_name', 'store_owner_card', 'store_mobile'], 'string', 'max' => 50],
            [['store_pass'], 'string', 'max' => 64],
            [['area_info', 'store_address', 'store_workingtime'], 'string', 'max' => 100],
            [['store_zip', 'store_time', 'store_end_time'], 'string', 'max' => 10],
            [['store_close_info', 'store_logo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store_id' => '店铺索引id',
            'store_name' => '店铺名称',
            'store_pass' => '店铺登录密码',
            'store_name_auth' => '店主认证',
            'grade_id' => '店铺等级',
            'store_owner_name' => '店主名',
            'store_owner_card' => '身份证',
            'area_id' => '地区id',
            'area_info' => '地区内容',
            'store_address' => '详细地区',
            'store_zip' => '邮政编码',
            'store_mobile' => '电话号码',
            'store_state' => '店铺状态，0关闭，1开启，2审核中',
            'store_close_info' => '店铺关闭原因',
            'store_sort' => '店铺排序',
            'store_time' => '店铺添加时间',
            'store_end_time' => '店铺关闭时间',
            'store_logo' => '店标',
            'store_workingtime' => '工作时间',
        ];
    }
}
